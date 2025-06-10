<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventaris</title>
    <link rel="stylesheet" href="/RPL-FINALFIX/public/style.css">
</head>
<body>
    <h1>Form Tambah Inventaris</h1>
    <form action="/RPL-FINALFIX/public/inventaris/simpan" method="POST">
        <div>
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>
        </div>
        <div>
            <label>Jumlah</label>
            <input type="number" name="jumlah" required>
        </div>
        <div>
            <label>Kondisi</label>
            <select name="kondisi">
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>
        </div>
        <div>
            <label>Tanggal Pengadaan</label>
            <input type="date" name="tanggal_pengadaan">
        </div>
        <div>
            <label>Keterangan</label>
            <textarea name="keterangan"></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>