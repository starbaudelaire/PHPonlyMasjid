<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal Kajian</title>
    <style> /* Bisa copy-paste style dari create.php */ </style>
</head>
<body>
    <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; ?>
    <div class="container">
        <div class="card">
            <h1>Form Edit Jadwal Kajian</h1>
            <form action="/RPL-FINALFIX/public/jadwal/update" method="POST">
                <input type="hidden" name="id" value="<?= $jadwal['id'] ?>">
                <div class="form-group">
                    <label>Judul Kajian:</label>
                    <input type="text" name="judul_kajian" value="<?= htmlspecialchars($jadwal['judul_kajian']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Penceramah:</label>
                    <input type="text" name="penceramah" value="<?= htmlspecialchars($jadwal['penceramah']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Waktu & Tanggal:</label>
                    <input type="datetime-local" name="waktu_kajian" value="<?= date('Y-m-d\TH:i', strtotime($jadwal['waktu_kajian'])) ?>" required>
                </div>
                <div class="form-group">
                    <label>Lokasi:</label>
                    <input type="text" name="lokasi" value="<?= htmlspecialchars($jadwal['lokasi']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Keterangan (Opsional):</label>
                    <textarea name="keterangan" rows="3"><?= htmlspecialchars($jadwal['keterangan']) ?></textarea>
                </div>
                <button type="submit">Update Jadwal</button>
            </form>
             <p style="text-align: center; margin-top: 20px;"><a href="/RPL-FINALFIX/public/jadwal">Batal</a></p>
        </div>
    </div>
</body>
</html>