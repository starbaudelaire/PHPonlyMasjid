<style>
    .shortcut-container { display: flex; gap: 20px; margin-top: 20px; }
    .shortcut-card {
        flex: 1;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        text-align: center;
        padding: 20px;
        text-decoration: none;
        color: #333;
        transition: transform 0.2s;
    }
    .shortcut-card:hover { transform: translateY(-5px); }
    .shortcut-card img { max-width: 100px; margin-bottom: 15px; }
    .shortcut-card h3 { margin: 0; }
</style>

<h1>Beranda Pengurus</h1>
<p>Pilih menu di samping atau gunakan shortcut di bawah ini untuk navigasi cepat.</p>

<div class="shortcut-container">
    <?php if (isAdmin() || isSekben()): ?>
    <a href="/RPL-FINALFIX/public/keuangan" class="shortcut-card">
        <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png" alt="Keuangan">
        <h3>Laporan Keuangan</h3>
    </a>
    <?php endif; ?>

    <?php if (isAdmin() || isRumahTangga()): ?>
    <a href="/RPL-FINALFIX/public/admin/peminjaman" class="shortcut-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3500/3500833.png" alt="Peminjaman">
        <h3>Manajemen Peminjaman</h3>
    </a>
    <?php endif; ?>

    <?php if (isAdmin() || isSekben() || isRumahTangga()): ?>
    <a href="/RPL-FINALFIX/public/jadwal" class="shortcut-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3409/3409586.png" alt="Jadwal">
        <h3>Jadwal Kajian</h3>
    </a>
    <?php endif; ?>
</div>