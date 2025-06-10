<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di Website MasjidKu</title>
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; color: #333; margin: 0; }
        .hero { background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/1600x900/?mosque') no-repeat center center; background-size: cover; color: white; padding: 100px 20px; text-align: center; }
        .hero h1 { font-size: 3.5em; margin: 0; } .hero p { font-size: 1.5em; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        section { background-color: white; padding: 30px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        h2 { border-bottom: 2px solid #28a745; padding-bottom: 10px; font-size: 2em; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .pemasukan { color: green; } .pengeluaran { color: red; }
        .btn-pinjam { display: inline-block; background-color: #ffc107; color: #333; padding: 15px 30px; font-size: 1.2em; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <?php require_once BASE_PATH . '/src/Views/partials/navbar_public.php'; ?>

    <div class="hero">
        <h1>MasjidKu Digital</h1>
        <p>Menyajikan Informasi dan Layanan Masjid Secara Transparan dan Terbuka</p>
    </div>

    <div class="container">
        <section id="keuangan">
            <h2>Ringkasan Keuangan Terbaru</h2>
            <table>
                <thead>
                    <tr><th>Tanggal</th><th>Deskripsi</th><th style="text-align:right;">Pemasukan (Rp)</th><th style="text-align:right;">Pengeluaran (Rp)</th></tr>
                </thead>
                <tbody>
                    <?php foreach($transaksi_publik as $trx): ?>
                        <tr>
                            <td><?= date('d M Y', strtotime($trx['tanggal'])) ?></td>
                            <td><?= htmlspecialchars($trx['deskripsi']) ?></td>
                            <td style="text-align:right;" class="pemasukan"><?= $trx['jenis'] == 'pemasukan' ? number_format($trx['jumlah'], 0, ',', '.') : '-' ?></td>
                            <td style="text-align:right;" class="pengeluaran"><?= $trx['jenis'] == 'pengeluaran' ? number_format($trx['jumlah'], 0, ',', '.') : '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="jadwal">
            <h2>Jadwal Kajian Terdekat</h2>
            <table>
                <?php if (!empty($jadwal_publik)): ?>
                    <?php foreach($jadwal_publik as $jadwal): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($jadwal['judul_kajian']) ?></strong></td>
                            <td>Ust. <?= htmlspecialchars($jadwal['penceramah']) ?></td>
                            <td><?= date('l, d M Y, H:i', strtotime($jadwal['waktu_kajian'])) ?> WIB</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td>Belum ada jadwal kajian yang akan datang.</td></tr>
                <?php endif; ?>
            </table>
        </section>

        <section id="peminjaman" style="text-align:center;">
            <h2>Peminjaman Inventaris Masjid</h2>
            <p>Butuh meminjam barang inventaris masjid untuk kegiatan Anda? Silakan ajukan di sini.</p>
            <a href="/RPL-FINALFIX/public/pinjam-barang" class="btn-pinjam">Ajukan Peminjaman Sekarang</a>
        </section>
    </div>

</body>
</html>