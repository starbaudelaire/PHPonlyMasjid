<?php

namespace Controllers;

class PeminjamanAdminController {

    public function index() {
        authorize(isAdmin() || isRumahTangga());
        $peminjamanModel = new \Models\Peminjaman();

        view('admin/peminjaman/index', [
            'requests' => $peminjamanModel->getAllWithDetails()
        ]);
    }

    // Method updateStatus tidak berubah
    public function updateStatus() { /* ... kode lama ... */ }
}