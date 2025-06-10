<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman Barang Masjid</title>
    <style> form { max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #218838; }
        .nav-link { display: inline-block; margin-bottom: 20px; } </style>
</head>
<body>
    <h1>Form Peminjaman Barang</h1>
<form action="/RPL-FINALFIX/public/pinjam" method="POST">        <fieldset>
            <legend>Data Peminjam</legend>
            <div><label>Nama Lengkap:</label><input type="text" name="nama_peminjam" required></div>
            <div><label>Instansi/Organisasi:</label><input type="text" name="instansi"></div>
           <div style="margin-top: 10px;">
        <label>Nomor WA Aktif:</label>
        <input type="tel" name="wa_peminjam" placeholder="Contoh: 081234567890" required>
    </div>
            <div><label>Keperluan:</label><textarea name="keperluan" required></textarea></div>
            <div><label>Link Surat Pengajuan (Google Drive):</label><input type="url" name="link_surat" placeholder="https://docs.google.com/..."></div>
        </fieldset>

        <fieldset>
            <legend>Detail Peminjaman</legend>
            <div><label>Tanggal Pinjam:</label><input type="date" name="tanggal_pinjam" required></div>
            <div><label>Tanggal Kembali:</label><input type="date" name="tanggal_kembali" required></div>
        </fieldset>

        <fieldset>
            <legend>Pilih Barang (Bisa lebih dari satu)</legend>
            <?php foreach ($semua_barang as $barang): ?>
                <div class="barang-item" style="display: flex; align-items: center; margin-bottom: 10px;">
                    <input type="checkbox" name="barang_ids[]" value="<?= $barang['id'] ?>" id="barang_<?= $barang['id'] ?>">
                    <img src="<?= htmlspecialchars($barang['foto_url'] ?: 'https://via.placeholder.com/50') ?>" alt="<?= htmlspecialchars($barang['nama_barang']) ?>" style="width: 50px; height: 50px; object-fit: cover; margin-left: 10px; margin-right: 10px;">
                    <label for="barang_<?= $barang['id'] ?>"><?= htmlspecialchars($barang['nama_barang']) ?> (Stok: <?= $barang['jumlah'] ?>)</label>
                </div>
            <?php endforeach; ?>
        </fieldset>
        
        <button type="submit">Kirim Permintaan</button>
    </form>
</body>
</html>