<?php

namespace Controllers;

class AuthController {

    // Menampilkan halaman form login
    public function showLoginForm() {
        // Halaman login tidak butuh data apa-apa, jadi array-nya kosong
        view('auth/login');
    }

    // Method login() tidak berubah karena tidak me-render view, hanya redirect
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new \Models\User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'role' => $user['role']
            ];
            
            // Semua role setelah login, dilempar ke dashboard
            header('Location: /RPL-FINALFIX/public/dashboard');
            exit();
        } else {
            // Nanti bisa tambahin flash message error di sini
            header('Location: /RPL-FINALFIX/public/login');
            exit();
        }
    }

    // Method logout() tidak berubah
    public function logout() {
        session_destroy();
        header('Location: /RPL-FINALFIX/public/login');
        exit();
    }
}