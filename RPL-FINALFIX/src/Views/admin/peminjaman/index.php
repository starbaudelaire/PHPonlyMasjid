<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Peminjaman Barang</title>
    <style> /* Bisa copy-paste style dari view tabel lain */ </style>
</head>
<body>
    <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; // <--- TINGGAL PANGGIL INI ?>

    <div class="container">
        <h1>Manajemen Peminjaman Barang</h1>
        <table>
            <thead>
                <tr>
                    <th>Tgl Request</th>
                    <th>Peminjam</th>
                    <th>Kontak WA</th>
                    <th>Barang Dipinjam</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($requests)): ?>
                    <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?= date('d M Y', strtotime($req['created_at'])) ?></td>
                            <td><?= htmlspecialchars($req['nama_peminjam']) ?></td>
                            <td><?= htmlspecialchars($req['wa_peminjam']) ?></td>
                            <td><?= htmlspecialchars($req['daftar_barang']) ?></td>
                            <td><?= htmlspecialchars($req['keperluan']) ?></td>
                            <td><b><?= htmlspecialchars($req['status']) ?></b></td>
                            <td>
                                <?php if ($req['status'] == 'Pending'): ?>
                                    <form action="/RPL-FINALFIX/public/admin/peminjaman/update-status" method="POST" style="display:inline;">
                                        <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                        <input type="hidden" name="status" value="Disetujui">
                                        <button type="submit">Setujui</button>
                                    </form>
                                    <form action="/RPL-FINALFIX/public/admin/peminjaman/update-status" method="POST" style="display:inline;">
                                        <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                        <input type="hidden" name="status" value="Ditolak">
                                        <button type="submit" style="background-color:red;">Tolak</button>
                                    </form>
                                <?php elseif ($req['status'] == 'Disetujui'): ?>
                                    <form action="/RPL-FINALFIX/public/admin/peminjaman/update-status" method="POST" style="display:inline;">
                                        <input type="hidden" name="request_id" value="<?= $req['id'] ?>">
                                        <input type="hidden" name="status" value="Selesai">
                                        <button type="submit" style="background-color:green;">Selesaikan</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align:center;">Belum ada permintaan peminjaman.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>