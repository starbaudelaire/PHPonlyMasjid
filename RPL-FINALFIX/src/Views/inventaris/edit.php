<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Inventaris</title>
    <link rel="stylesheet" href="/RPL-FINALFIX/public/style.css">
    <style>
        /* Bisa copy-paste style dari views/keuangan/create.php */
        form { max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #0056b3; }
        .nav-link { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Form Edit Inventaris</h1>
        <a href="/RPL-FINALFIX/public/inventaris" class="nav-link">Kembali ke Daftar Inventaris</a>
    </div>

    <form action="/RPL-FINALFIX/public/inventaris/update" method="POST">
        
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($item['nama_barang']) ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($item['jumlah']) ?>" required>
        </div>
        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi">
                <option value="Baik" <?= $item['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                <option value="Rusak Ringan" <?= $item['kondisi'] == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                <option value="Rusak Berat" <?= $item['kondisi'] == 'Rusak Berat' ? 'selected' : '' ?>>Rusak Berat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
            <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan" value="<?= htmlspecialchars($item['tanggal_pengadaan']) ?>">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan"><?= htmlspecialchars($item['keterangan']) ?></textarea>
        </div>
        <button type="submit">Update Inventaris</button>
    </form>
</body>
</html>