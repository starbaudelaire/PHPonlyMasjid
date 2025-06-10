<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Inventaris Masjid</title>
    <link rel="stylesheet" href="/RPL-FINALFIX/public/style.css">
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 1000px; margin: 20px auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions-cell { white-space: nowrap; }
        .btn, a.btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-tambah { color: #fff; background-color: #28a745; border-color: #28a745; }
        .btn-edit { color: #212529; background-color: #ffc107; border-color: #ffc107; }
        .btn-hapus { color: #fff; background-color: #dc3545; border-color: #dc3545; }
    </style>
</head>
<body>
  <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; // <--- TINGGAL PANGGIL INI ?>
    <div class="container">
    <div class="container">
        <div style="text-align: center;">
            <h1>Daftar Inventaris Masjid</h1>
            <a href="/RPL-FINALFIX/public/inventaris/tambah" class="btn btn-tambah">Tambah Inventaris Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Keterangan</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($semua_inventaris)): ?>
                    <?php foreach ($semua_inventaris as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                            <td><?= htmlspecialchars($item['jumlah']) ?></td>
                            <td><?= htmlspecialchars($item['kondisi']) ?></td>
                            <td><?= htmlspecialchars(date('d M Y', strtotime($item['tanggal_pengadaan']))) ?></td>
                            <td><?= htmlspecialchars($item['keterangan']) ?></td>
                            <td class="actions-cell">
                                <a href="/RPL-FINALFIX/public/inventaris/edit?id=<?= $item['id'] ?>" class="btn btn-edit">Edit</a>
                                <form action="/RPL-FINALFIX/public/inventaris/hapus" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus item ini?');">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Belum ada data inventaris.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>