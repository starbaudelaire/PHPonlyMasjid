<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Jadwal Kajian</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; }
        .container { max-width: 1100px; margin: 0 auto; padding: 20px; }
        .card { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .actions-cell { white-space: nowrap; width: 1%; }
        .btn, a.btn {
            display: inline-block; padding: 6px 12px; margin-right: 5px; font-size: 14px; font-weight: 400; text-align: center; cursor: pointer;
            border: 1px solid transparent; border-radius: 4px; text-decoration: none;
        }
        .btn-tambah { color: #fff; background-color: #28a745; border-color: #28a745; }
        .btn-edit { color: #212529; background-color: #ffc107; border-color: #ffc107; }
        .btn-hapus { color: #fff; background-color: #dc3545; border-color: #dc3545; }
    </style>
</head>
<body>
    <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; ?>
    <div class="container">
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1>Manajemen Jadwal Kajian</h1>
                <a href="/RPL-FINALFIX/public/jadwal/tambah" class="btn btn-tambah">Tambah Jadwal Baru</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Waktu Kajian</th>
                        <th>Judul Kajian</th>
                        <th>Penceramah</th>
                        <th>Lokasi</th>
                        <th class="actions-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($semua_jadwal)): ?>
                        <?php foreach ($semua_jadwal as $j): ?>
                            <tr>
                                <td><?= htmlspecialchars(date('D, d M Y, H:i', strtotime($j['waktu_kajian']))) ?> WIB</td>
                                <td><?= htmlspecialchars($j['judul_kajian']) ?></td>
                                <td><?= htmlspecialchars($j['penceramah']) ?></td>
                                <td><?= htmlspecialchars($j['lokasi']) ?></td>
                                <td class="actions-cell">
                                    <a href="/RPL-FINALFIX/public/jadwal/edit?id=<?= $j['id'] ?>" class="btn btn-edit">Edit</a>
                                    <?php if (isAdmin()): ?>
                                        <form action="/RPL-FINALFIX/public/jadwal/hapus" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus jadwal ini?');">
                                            <input type="hidden" name="id" value="<?= $j['id'] ?>">
                                            <button type="submit" class="btn btn-hapus">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                         <tr>
                            <td colspan="5" style="text-align: center;">Belum ada jadwal.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>