<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi Baru</title>
    <link rel="stylesheet" href="/RPL-FINALFIX/public/style.css">
    <style>
        form { max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #218838; }
        .nav-link { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Form Tambah Transaksi</h1>
        <a href="/RPL-FINALFIX/public/keuangan" class="nav-link">Kembali ke Laporan</a>
    </div>

    <form action="/RPL-FINALFIX/public/keuangan/simpan" method="POST">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah (Rp)</label>
            <input type="number" id="jumlah" name="jumlah" placeholder="Contoh: 50000" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Transaksi</label>
            <select id="jenis" name="jenis" required>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
        </div>
        <button type="submit">Simpan Transaksi</button>
    </form>
</body>
</html>