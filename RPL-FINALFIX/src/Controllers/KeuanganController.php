<?php

namespace Controllers;

class KeuanganController {

    public function index() {
        authorize(isAdmin() || isSekben());
        $transaksiModel = new \Models\Transaksi();
        
        view('keuangan/index', [
            'semua_transaksi' => $transaksiModel->findAll()
        ]);
    }

    public function create() {
        authorize(isAdmin() || isSekben());
        view('keuangan/create');
    }

    public function edit() {
        authorize(isAdmin() || isSekben());
        $id = $_GET['id'];
        $transaksiModel = new \Models\Transaksi();
        $transaksi = $transaksiModel->findById($id);

        if ($transaksi) {
            view('keuangan/edit', ['transaksi' => $transaksi]);
        } else {
            authorize(false, 404); // Tampilkan halaman 404 jika tidak ketemu
        }
    }

    // Method store, update, destroy tidak berubah karena tidak me-render view
    public function store() { /* ... kode lama ... */ }
    public function update() { /* ... kode lama ... */ }
    public function destroy() { /* ... kode lama ... */ }
}