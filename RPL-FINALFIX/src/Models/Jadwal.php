<?php

namespace Models;

class Jadwal extends \Core\Model {

    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM jadwal ORDER BY waktu_kajian DESC");
        return $stmt->fetchAll();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM jadwal WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save($data) {
        $query = "INSERT INTO jadwal (judul_kajian, penceramah, waktu_kajian, lokasi, keterangan) VALUES (:judul_kajian, :penceramah, :waktu_kajian, :lokasi, :keterangan)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    public function update($data) {
        $query = "UPDATE jadwal SET judul_kajian = :judul_kajian, penceramah = :penceramah, waktu_kajian = :waktu_kajian, lokasi = :lokasi, keterangan = :keterangan WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $query = "DELETE FROM jadwal WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    // Method baru untuk mengambil jadwal yang akan datang
// Lokasi: src/Models/Jadwal.php

// Method baru untuk mengambil jadwal yang akan datang
public function getUpcoming($limit = 5) {
    // 1. Pastikan variabel $limit adalah angka integer murni untuk keamanan.
    $limit = (int) $limit;

    // 2. Masukkan variabel $limit langsung ke dalam string query.
    //    Ini cara yang benar untuk klausa LIMIT di PDO.
    $query = "SELECT * FROM jadwal WHERE waktu_kajian >= NOW() ORDER BY waktu_kajian ASC LIMIT {$limit}";

    // 3. Karena tidak ada placeholder lain, kita bisa langsung pakai query().
    $stmt = $this->db->query($query);
    
    return $stmt->fetchAll();
}
}