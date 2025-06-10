<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;

    // Bikin constructor private biar gak bisa di-instantiate dari luar
    private function __construct() {}

    // Satu-satunya cara buat dapet koneksi PDO
    public static function getInstance() {
        if (self::$instance == null) {
            // Konfigurasi DSN (Data Source Name)
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS);

                // Set atribut PDO biar lebih ciamik
                // 1. Kalo ada error, keluarin exception (biar gampang di-debug)
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // 2. Hasil query default-nya dalam bentuk array asosiatif
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                // Kalo koneksi gagal, matiin aplikasi dan kasih tau errornya
                die('Koneksi Database Gagal: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}