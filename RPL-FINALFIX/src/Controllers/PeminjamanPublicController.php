<?php

namespace Controllers;

class PeminjamanPublicController {

    public function create() {
        $inventarisModel = new \Models\Inventaris();
        
        view('peminjaman/create_public', [
            'semua_barang' => $inventarisModel->findAll()
        ]);
    }

    public function success() {
        view('peminjaman/sukses');
    }

    // Method store tidak berubah
    public function store() { /* ... kode lama ... */ }
}