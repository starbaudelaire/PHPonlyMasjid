<?php

namespace Models;

class Inventaris extends \Core\Model {

    // Mengambil semua data inventaris
    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM inventaris ORDER BY nama_barang ASC");
        return $stmt->fetchAll();
    }

    // Mengambil satu data inventaris berdasarkan ID
    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM inventaris WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Menyimpan data inventaris baru
    public function save($data) {
        $query = "INSERT INTO inventaris (nama_barang, jumlah, kondisi, keterangan, tanggal_pengadaan) VALUES (:nama_barang, :jumlah, :kondisi, :keterangan, :tanggal_pengadaan)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nama_barang' => $data['nama_barang'],
            ':jumlah' => $data['jumlah'],
            ':kondisi' => $data['kondisi'],
            ':keterangan' => $data['keterangan'],
            ':tanggal_pengadaan' => $data['tanggal_pengadaan'],
        ]);
    }

    // Mengupdate data inventaris
    public function update($data) {
        $query = "UPDATE inventaris 
                  SET nama_barang = :nama_barang, 
                      jumlah = :jumlah, 
                      kondisi = :kondisi, 
                      keterangan = :keterangan,
                      tanggal_pengadaan = :tanggal_pengadaan
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $data['id'],
            ':nama_barang' => $data['nama_barang'],
            ':jumlah' => $data['jumlah'],
            ':kondisi' => $data['kondisi'],
            ':keterangan' => $data['keterangan'],
            ':tanggal_pengadaan' => $data['tanggal_pengadaan'],
        ]);
    }

    // Menghapus data inventaris
    public function delete($id) {
        $query = "DELETE FROM inventaris WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}