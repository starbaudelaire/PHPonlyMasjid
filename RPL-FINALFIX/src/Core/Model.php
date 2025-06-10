<?php

namespace Core;

// Ini adalah kelas dasar untuk semua model di aplikasi kita
abstract class Model {
    protected $db;

    public function __construct() {
        // Setiap model yang dibuat otomatis punya akses ke database
        $this->db = Database::getInstance();
    }
}