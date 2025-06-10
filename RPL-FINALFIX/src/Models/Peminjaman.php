<?php

namespace Models;

class Peminjaman extends \Core\Model {

    // Method canggih untuk menyimpan request peminjaman dan barang-barangnya sekaligus
    public function createRequest($requestData, $itemIds) {
        // Kita pake database transaction. Ini buat mastiin semua query berhasil.
        // Kalo ada satu aja yang gagal, semua bakal dibatalin. Data jadi aman.
        $this->db->beginTransaction();

        try {
            // 1. Simpan data utama ke tabel peminjaman_requests
            $queryRequest = "INSERT INTO peminjaman_requests (nama_peminjam, instansi, wa_peminjam, tanggal_pinjam, tanggal_kembali, link_surat, keperluan) 
                         VALUES (:nama_peminjam, :instansi, :wa_peminjam, :tanggal_pinjam, :tanggal_kembali, :link_surat, :keperluan)";
            
            $stmtRequest = $this->db->prepare($queryRequest);
           $stmtRequest->execute([
            ':nama_peminjam' => $requestData['nama_peminjam'],
            ':instansi' => $requestData['instansi'],
            ':wa_peminjam' => $requestData['wa_peminjam'], // <-- TAMBAHIN INI
            ':tanggal_pinjam' => $requestData['tanggal_pinjam'],
            ':tanggal_kembali' => $requestData['tanggal_kembali'],
            ':link_surat' => $requestData['link_surat'],
            ':keperluan' => $requestData['keperluan']
        ]);

            // 2. Ambil ID dari request yang barusan kita simpan
            $peminjamanId = $this->db->lastInsertId();

            // 3. Simpan barang-barang yang dipinjam ke tabel peminjaman_items
            $queryItems = "INSERT INTO peminjaman_items (peminjaman_id, inventaris_id) VALUES (?, ?)";
            $stmtItems = $this->db->prepare($queryItems);

            // Loop sebanyak barang yang dipilih di form
            foreach ($itemIds as $itemId) {
                $stmtItems->execute([$peminjamanId, $itemId]);
            }

            // Jika semua query berhasil, konfirmasi perubahan ke database
            $this->db->commit();
            return true;

        } catch (\PDOException $e) {
            // Jika ada satu aja query yang error, batalkan semua perubahan
            $this->db->rollBack();
            // die("Error saat menyimpan peminjaman: " . $e->getMessage()); // Nyalakan untuk debugging
            return false;
        }
    }
    // Method baru untuk mengambil semua request plus detail barangnya
    public function getAllWithDetails() {
        // Ini query canggih pake JOIN dan GROUP_CONCAT
        $query = "SELECT 
                    pr.*, 
                    GROUP_CONCAT(i.nama_barang SEPARATOR ', ') as daftar_barang
                  FROM 
                    peminjaman_requests pr
                  LEFT JOIN 
                    peminjaman_items pi ON pr.id = pi.peminjaman_id
                  LEFT JOIN 
                    inventaris i ON pi.inventaris_id = i.id
                  GROUP BY 
                    pr.id
                  ORDER BY 
                    pr.status = 'Pending' DESC, pr.created_at DESC";
        
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }

    // Method baru untuk update status aja
    public function updateStatus($id, $status) {
        $query = "UPDATE peminjaman_requests SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$status, $id]);
    }
}