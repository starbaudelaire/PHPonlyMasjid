<?php

namespace Controllers;

class HomeController {

    public function index() {
        $jadwalModel = new \Models\Jadwal();
        $transaksiModel = new \Models\Transaksi();

        // Kirim semua data yang dibutuhkan oleh view 'home/index.php'
       // Panggil helper BARU untuk halaman publik
        public_view('home/index', [
            'jadwal_publik' => $jadwalModel->getUpcoming(3),
            'transaksi_publik' => $transaksiModel->getPublicSummary(10)
        ]);
    }
}