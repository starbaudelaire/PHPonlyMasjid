<?php

namespace Controllers;

class JadwalController {
    
    private function checkAuth() {
        authorize(isAdmin() || isSekben() || isRumahTangga());
    }

    public function index() {
        $this->checkAuth();
        $jadwalModel = new \Models\Jadwal();

        view('jadwal/index', [
            'semua_jadwal' => $jadwalModel->findAll()
        ]);
    }

    public function create() {
        $this->checkAuth();
        view('jadwal/create');
    }

    public function edit() {
        $this->checkAuth();
        $id = $_GET['id'];
        $jadwalModel = new \Models\Jadwal();
        $jadwal = $jadwalModel->findById($id);

        if ($jadwal) {
            view('jadwal/edit', ['jadwal' => $jadwal]);
        } else {
            authorize(false, 404);
        }
    }

    // Method store, update, destroy tidak berubah
    public function store() { /* ... kode lama ... */ }
    public function update() { /* ... kode lama ... */ }
    public function destroy() { /* ... kode lama ... */ }
}