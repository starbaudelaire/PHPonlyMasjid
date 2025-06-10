<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard MasjidKu</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; }
        .main-container { display: flex; }
        .sidebar { width: 250px; background-color: #343a40; color: white; min-height: 100vh; }
        .sidebar .logo { padding: 20px; text-align: center; font-size: 1.8em; background-color: #28a745; }
        .sidebar .nav-menu { list-style: none; padding: 0; margin: 20px 0; }
        .sidebar .nav-menu a { display: block; color: #adb5bd; padding: 15px 20px; text-decoration: none; }
        .sidebar .nav-menu a:hover { background-color: #495057; color: white; }
        .main-content { flex-grow: 1; padding: 20px; }
    </style>
</head>
<body>
    <div class="main-container">
        <aside class="sidebar">
            <div class="logo">MasjidKu</div>
            <ul class="nav-menu">
                <li><a href="/RPL-FINALFIX/public/dashboard">Beranda</a></li>
                <?php if (isAdmin() || isSekben()): ?>
                    <li><a href="/RPL-FINALFIX/public/keuangan">Laporan Keuangan</a></li>
                <?php endif; ?>
                <?php if (isAdmin() || isRumahTangga()): ?>
                    <li><a href="/RPL-FINALFIX/public/inventaris">Daftar Inventaris</a></li>
                    <li><a href="/RPL-FINALFIX/public/admin/peminjaman">Manajemen Peminjaman</a></li>
                <?php endif; ?>
                <?php if (isAdmin() || isSekben() || isRumahTangga()): ?>
                    <li><a href="/RPL-FINALFIX/public/jadwal">Jadwal Kajian</a></li>
                <?php endif; ?>
            </ul>
        </aside>

        <div class="main-content">
            <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; // Panel user di atas konten ?>
            <main>
                <?= $content // Di sini konten dari tiap halaman (dashboard, keuangan, dll.) akan disisipkan ?>
            </main>
        </div>
    </div>
</body>
</html>