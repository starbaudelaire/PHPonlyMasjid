<?php

namespace Controllers;

class DashboardController {

    public function index() {
        authorize(isAuthenticated());

        // Untuk sementara, kita hanya butuh data jadwal di dashboard
        $jadwalModel = new \Models\Jadwal();

        view('dashboard/index', [
            'jadwal_terdekat' => $jadwalModel->getUpcoming(5)
        ]);
    }
}