<?php
// TAMBAHKAN BARIS INI
require_once BASE_PATH . '/src/helpers.php';
spl_autoload_register(function ($className) {
    // Definisikan path dasar project kita. Ini biar semua file tau di mana "rumahnya".
    if (!defined('BASE_PATH')) {
        define('BASE_PATH', dirname(__DIR__, 2));
    }
    
    // Ganti backslash (\) dengan forward slash (/) sesuai path folder
    $className = str_replace('\\', '/', $className);
    
    // Kita gunakan BASE_PATH sebagai titik awal pencarian file
    $file = BASE_PATH . '/src/' . $className . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});