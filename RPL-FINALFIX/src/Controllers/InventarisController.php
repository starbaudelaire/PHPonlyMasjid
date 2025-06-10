<?php

namespace Controllers;

class InventarisController {

    public function index() {
        authorize(isAdmin() || isRumahTangga());
        $inventarisModel = new \Models\Inventaris();

        view('inventaris/index', [
            'semua_inventaris' => $inventarisModel->findAll()
        ]);
    }

    public function create() {
        authorize(isAdmin() || isRumahTangga());
        view('inventaris/create');
    }

    public function edit() {
        authorize(isAdmin() || isRumahTangga());
        $id = $_GET['id'];
        $inventarisModel = new \Models\Inventaris();
        $item = $inventarisModel->findById($id);

        if ($item) {
            view('inventaris/edit', ['item' => $item]);
        } else {
            authorize(false, 404);
        }
    }

    // Method store, update, destroy tidak berubah
    public function store() { /* ... kode lama ... */ }
    public function update() { /* ... kode lama ... */ }
    public function destroy() { /* ... kode lama ... */ }
}