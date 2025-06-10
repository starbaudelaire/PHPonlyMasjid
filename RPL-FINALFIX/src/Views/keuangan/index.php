<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan</title>
    <link rel="stylesheet" href="/RPL-FINALFIX/public/style.css">
    <style>
        /* ... (style yang udah ada biarin aja) ... */
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .pemasukan { color: green; }
        .pengeluaran { color: red; }
        /* Style untuk tombol hapus */
        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-hapus:hover { background-color: #c82333; }
        /* Style untuk tombol edit */
.btn-edit {
    background-color: #ffc107;
    color: black;
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}
.btn-edit:hover { background-color: #e0a800; }
    </style>
</head>
<body>
  <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; // <--- TINGGAL PANGGIL INI ?>
    <div class="container">
    <div style="text-align: center;">
        <h1>Laporan Keuangan Masjid</h1>
        <a href="/RPL-FINALFIX/public/keuangan/tambah">Tambah Transaksi Baru</a>
    </div>

    <?php if (!empty($semua_transaksi)): ?>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jenis</th>
                    <th>Jumlah (Rp)</th>
                    <th>Aksi</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($semua_transaksi as $transaksi): ?>
                    <tr>
                        <td><?= htmlspecialchars($transaksi['tanggal']) ?></td>
                        <td><?= htmlspecialchars($transaksi['deskripsi']) ?></td>
                        <td class="<?= htmlspecialchars($transaksi['jenis']) ?>">
                            <?= htmlspecialchars(ucfirst($transaksi['jenis'])) ?>
                        </td>
                        <td style="text-align: right;">
                            <?= number_format($transaksi['jumlah'], 0, ',', '.') ?>
                        </td>
                        <td>
                            <form action="/RPL-FINALFIX/public/keuangan/hapus" method="POST" onsubmit="return confirm('Yakin mau hapus data ini? Data yang dihapus tidak bisa dikembalikan!');">
                                <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                        <td>
                      <a href="/RPL-FINALFIX/public/keuangan/edit?id=<?= $transaksi['id'] ?>" class="btn-edit">Edit</a>
    <?php if (isAdmin()): // <-- BUNGKUS DENGAN KONDISI INI ?>
    <form action="/RPL-FINALFIX/public/keuangan/hapus" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus item ini?');">
        <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">
        <button type="submit" class="btn-hapus">Hapus</button>
    </form>
    <?php endif; // <-- JANGAN LUPA PENUTUPNYA ?>
                        </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada data transaksi.</p>
    <?php endif; ?>

</body>
</html>