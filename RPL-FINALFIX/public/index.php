<?php

session_start();

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/config.php';
require_once BASE_PATH . '/src/Core/bootstrap.php';

$router = new Core\Router();

// Ganti rute get('/') yang lama
$router->get('/', ['controller' => 'HomeController', 'action' => 'index']); // Untuk landing page publik
$router->get('/dashboard', ['controller' => 'DashboardController', 'action' => 'index']); // Untuk dashboard setelah login

// ... (sisa rute lain biarin aja)
// ... (setelah $router = new Core\Router();)

// Rute Publik
// Rute Publik Peminjaman
$router->get('/pinjam', ['controller' => 'PeminjamanPublicController', 'action' => 'create']);
$router->post('/pinjam', ['controller' => 'PeminjamanPublicController', 'action' => 'store']);
$router->get('/pinjam/sukses', ['controller' => 'PeminjamanPublicController', 'action' => 'success']);

// ... (setelah rute-rute publik)

// Rute untuk Manajemen Peminjaman (Backend)
$router->get('/admin/peminjaman', ['controller' => 'PeminjamanAdminController', 'action' => 'index']);
$router->post('/admin/peminjaman/update-status', ['controller' => 'PeminjamanAdminController', 'action' => 'updateStatus']);

// ... (sisa rute-rute lama)
// ... (sisa rute-rute lama)
// ...
$router->get('/', ['controller' => 'HomeController', 'action' => 'index']);

// Ganti rute login yang lama dengan ini
$router->get('/login', ['controller' => 'AuthController', 'action' => 'showLoginForm']);
$router->post('/login', ['controller' => 'AuthController', 'action' => 'login']);
$router->post('/logout', ['controller' => 'AuthController', 'action' => 'logout']); // <-- TAMBAHIN INI

// Rute untuk Keuangan
$router->get('/keuangan', ['controller' => 'KeuanganController', 'action' => 'index']);
$router->get('/keuangan/tambah', ['controller' => 'KeuanganController', 'action' => 'create']);
$router->get('/keuangan/edit', ['controller' => 'KeuanganController', 'action' => 'edit']); // <-- TAMBAHIN INI
$router->post('/keuangan/simpan', ['controller' => 'KeuanganController', 'action' => 'store']);
$router->post('/keuangan/hapus', ['controller' => 'KeuanganController', 'action' => 'destroy']);
$router->post('/keuangan/update', ['controller' => 'KeuanganController', 'action' => 'update']); // <-- TAMBAHIN INI

// ... (setelah rute keuangan)

// Rute untuk Inventaris
$router->get('/inventaris', ['controller' => 'InventarisController', 'action' => 'index']);
$router->get('/inventaris/tambah', ['controller' => 'InventarisController', 'action' => 'create']);
$router->post('/inventaris/simpan', ['controller' => 'InventarisController', 'action' => 'store']);
$router->get('/inventaris/edit', ['controller' => 'InventarisController', 'action' => 'edit']);
$router->post('/inventaris/update', ['controller' => 'InventarisController', 'action' => 'update']);
$router->post('/inventaris/hapus', ['controller' => 'InventarisController', 'action' => 'destroy']);

// ... (setelah rute inventaris)

// Rute untuk Jadwal Kajian
$router->get('/jadwal', ['controller' => 'JadwalController', 'action' => 'index']);
$router->get('/jadwal/tambah', ['controller' => 'JadwalController', 'action' => 'create']);
$router->post('/jadwal/simpan', ['controller' => 'JadwalController', 'action' => 'store']);
$router->get('/jadwal/edit', ['controller' => 'JadwalController', 'action' => 'edit']);
$router->post('/jadwal/update', ['controller' => 'JadwalController', 'action' => 'update']);
$router->post('/jadwal/hapus', ['controller' => 'JadwalController', 'action' => 'destroy']);

// ================== BAGIAN YANG DIUBAH ==================
// Logika baru untuk menangani URL di sub-folder

// Ambil URI lengkap, contoh: /RPL-FINALFIX/public/keuangan?page=1
$requestUri = $_SERVER['REQUEST_URI'];

// Ambil path-nya aja, tanpa query string. Hasil: /RPL-FINALFIX/public/keuangan
$requestPath = parse_url($requestUri)['path'];

// Dapatkan path ke direktori public secara dinamis. Hasil: /RPL-FINALFIX/public
$publicPath = dirname($_SERVER['SCRIPT_NAME']);
// Handle kasus kalo di-install di root
$publicPath = ($publicPath == '/' || $publicPath == '\\') ? '' : $publicPath;

// Hapus path direktori public dari URL request untuk dapet URI bersih
// Ini akan mengubah "/RPL-FINALFIX/public/keuangan" menjadi "/keuangan"
$uri = str_replace($publicPath, '', $requestPath);

// Jika hasilnya kosong (untuk halaman home), set ke '/'
if (empty($uri)) {
    $uri = '/';
}

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Dispatch dengan URI yang sudah bersih
$router->dispatch($uri, $method);
// =======================================================