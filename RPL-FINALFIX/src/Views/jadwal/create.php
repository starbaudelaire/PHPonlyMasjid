<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Kajian</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; }
        .container { max-width: 700px; margin: 0 auto; padding: 20px; }
        .card { background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], input[type="datetime-local"], textarea {
            width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button { width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; ?>
    <div class="container">
        <div class="card">
            <h1>Form Tambah Jadwal Kajian</h1>
            <form action="/RPL-FINALFIX/public/jadwal/simpan" method="POST">
                <div class="form-group">
                    <label>Judul Kajian:</label>
                    <input type="text" name="judul_kajian" required>
                </div>
                <div class="form-group">
                    <label>Nama Penceramah:</label>
                    <input type="text" name="penceramah" required>
                </div>
                <div class="form-group">
                    <label>Waktu & Tanggal:</label>
                    <input type="datetime-local" name="waktu_kajian" required>
                </div>
                <div class="form-group">
                    <label>Lokasi:</label>
                    <input type="text" name="lokasi" value="Ruang Utama" required>
                </div>
                <div class="form-group">
                    <label>Keterangan (Opsional):</label>
                    <textarea name="keterangan" rows="3"></textarea>
                </div>
                <button type="submit">Simpan Jadwal</button>
            </form>
            <p style="text-align: center; margin-top: 20px;"><a href="/RPL-FINALFIX/public/jadwal">Batal</a></p>
        </div>
    </div>
</body>
</html>