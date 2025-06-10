<?php

namespace Models;

// Jangan lupa, Transaksi mewarisi semua kemampuan dari Model
class Transaksi extends \Core\Model {

    /**
     * Mengambil semua data transaksi dari database.
     */
    public function findAll() {
        try {
            // Ganti 'transaksi' jika nama tabel lu beda
            $stmt = $this->db->query("SELECT * FROM transaksi ORDER BY tanggal DESC, id DESC");
            
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            // Nanti kita bisa bikin logging error yang lebih proper
            die("Query Error di findAll(): " . $e->getMessage());
        }
    }

    /**
     * Mengambil satu data transaksi berdasarkan ID.
     */
    public function findById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id = ?");
            $stmt->execute([$id]);

            return $stmt->fetch();

        } catch (\PDOException $e) {
            die("Query Error di findById(): " . $e->getMessage());
        }
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function save($data) {
        try {
            // Query INSERT dengan prepared statements untuk keamanan
            $query = "INSERT INTO transaksi (deskripsi, tanggal, jumlah, jenis) VALUES (:deskripsi, :tanggal, :jumlah, :jenis)";

            $stmt = $this->db->prepare($query);

            // Eksekusi dengan mengirim array data
            $stmt->execute([
                ':deskripsi' => $data['deskripsi'],
                ':tanggal' => $data['tanggal'],
                ':jumlah' => $data['jumlah'],
                ':jenis' => $data['jenis']
            ]);
            
            return true;
        } catch (\PDOException $e) {
            // die($e->getMessage()); // Nyalakan ini hanya untuk debugging
            return false;
        }
    }

    public function delete($id) {
    try {
        // Query DELETE dengan prepared statement, sangat penting untuk keamanan
        $query = "DELETE FROM transaksi WHERE id = ?";
        $stmt = $this->db->prepare($query);
        
        // Eksekusi dengan mengirim ID
        $stmt->execute([$id]);

        return true;
    } catch (\PDOException $e) {
        // die($e->getMessage()); // Nyalakan untuk debugging
        return false;
    }
}
// Method untuk mengupdate data di database berdasarkan ID
public function update($data) {
    try {
        $query = "UPDATE transaksi 
                  SET deskripsi = :deskripsi, 
                      tanggal = :tanggal, 
                      jumlah = :jumlah, 
                      jenis = :jenis 
                  WHERE id = :id";
                  
        $stmt = $this->db->prepare($query);

        $stmt->execute([
            ':id' => $data['id'],
            ':deskripsi' => $data['deskripsi'],
            ':tanggal' => $data['tanggal'],
            ':jumlah' => $data['jumlah'],
            ':jenis' => $data['jenis']
        ]);

        return true;
    } catch (\PDOException $e) {
        // die($e->getMessage()); // Nyalakan untuk debugging
        return false;
    }
}
// Method baru untuk mengambil ringkasan transaksi publik
// Method baru untuk mengambil ringkasan transaksi publik
public function getPublicSummary($limit = 10) {
    // 1. Pastikan variabel $limit adalah angka integer murni untuk keamanan.
    $limit = (int) $limit;

    // 2. Masukkan variabel $limit langsung ke dalam string query.
    $query = "SELECT tanggal, deskripsi, jumlah, jenis FROM transaksi ORDER BY tanggal DESC, id DESC LIMIT {$limit}";

    // 3. Karena tidak ada placeholder, kita bisa langsung pakai query()
    $stmt = $this->db->query($query);
    
    return $stmt->fetchAll();
}
}