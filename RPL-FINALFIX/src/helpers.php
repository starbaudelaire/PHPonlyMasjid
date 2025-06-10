<?php

// --- FUNGSI KEAMANAN & SESSION ---

/**
 * Fungsi untuk mengecek apakah user sudah login atau belum.
 */
function isAuthenticated() {
    return isset($_SESSION['user']);
}

/**
 * Fungsi untuk mengecek apakah user adalah tamu (belum login).
 */
function isGuest() {
    return !isAuthenticated();
}

/**
 * Fungsi untuk mendapatkan data array user yang sedang login.
 */
function auth_user() {
    return $_SESSION['user'] ?? null;
}

/**
 * Fungsi "Penjaga Gerbang" utama.
 */
function authorize($condition, $statusCode = 403) {
    if (!$condition) {
        http_response_code($statusCode);
        require_once BASE_PATH . "/src/Views/errors/{$statusCode}.php";
        die();
    }
}

/**
 * Fungsi untuk mengecek apakah user yang login adalah admin.
 */
function isAdmin() {
    return isAuthenticated() && auth_user()['role'] === 'admin';
}

/**
 * Fungsi untuk mengecek apakah user yang login adalah sekben.
 */
function isSekben() {
    return isAuthenticated() && auth_user()['role'] === 'sekben';
}

/**
 * Fungsi untuk mengecek apakah user yang login adalah rumah tangga.
 */
function isRumahTangga() {
    return isAuthenticated() && auth_user()['role'] === 'rumahtangga';
}


// --- FUNGSI TAMPILAN / VIEW ---

/**
 * Fungsi untuk me-render view INTERNAL (dengan layout admin).
 */
function view($path, $data = []) {
    // extract() ini magic, dia ngubah key array jadi variabel.
    extract($data);

    // Muat konten spesifik halaman ke dalam buffer (memori sementara)
    ob_start();
    require_once BASE_PATH . "/src/Views/{$path}.php";
    $content = ob_get_clean();

    // Sekarang muat layout utama, yang nantinya akan nampilin $content
    require_once BASE_PATH . '/src/Views/layouts/app.php';
}

/**
 * Fungsi KHUSUS untuk me-render halaman PUBLIK (tanpa layout admin).
 */
function public_view($path, $data = []) {
    // extract() data biar bisa diakses di view
    extract($data);

    // Langsung panggil file view-nya, tanpa dibungkus apa-apa
    require_once BASE_PATH . "/src/Views/{$path}.php";
}