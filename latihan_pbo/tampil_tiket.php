<?php
require_once 'Koneksi.php';
require_once 'Tiket.php';

// 1. Buat instance objek dari class Koneksi asli milik Anda
$koneksiObj = new Koneksi();

// 2. Ambil protected $conn database link lewat fungsi pembantu bawaan Anda
$dbLink = $koneksiObj->getKoneksi(); 

// 3. Hubungkan tautan database ke objek pengambil record data
$dataTiketObj = new DataTiket($dbLink);
$listTiket = $dataTiketObj->ambilSemuaTiket();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Tiket PBO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .harga-akhir { color: #1b5e20; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Daftar Tiket Bioskop - Visualisasi Hasil Pemetaan Objek</h2>
    
    <table>
        <tr>
            <th>ID Tiket</th>
            <th>Nama Film</th>
            <th>Jenis Studio</th>
            <th>Jadwal Tayang</th>
            <th>Jumlah Kursi</th>
            <th>Harga Dasar</th>
            <th>Total Harga (Kalkulasi Objek)</th>
            <th>Fasilitas Tambahan Terpetakan</th>
        </tr>
        <?php 
        while($row = $listTiket->fetch_assoc()) { 
            // Polimorfisme: Instansiasi objek dinamis dan memetakan nilai dari array database
            if ($row['jenis_studio'] == 'Reguler') {
                $tiketObjek = new TiketRegular(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['tipe_audio'], $row['lokasi_baris']
                );
            } elseif ($row['jenis_studio'] == 'IMAX') {
                $tiketObjek = new TiketIMAX(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['kacamata_3d_id'], $row['efek_gerak_fitur']
                );
            } else {
                $tiketObjek = new TiketVelvet(
                    $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                    $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                    $row['bantal_selimut_pack'], $row['layanan_butler']
                );
            }
        ?>
        <tr>
            <td><?= $tiketObjek->getIdTiket(); ?></td>
            <td><?= $tiketObjek->getNamaFilm(); ?></td>
            <td><strong><?= $row['jenis_studio']; ?></strong></td>
            <td><?= $tiketObjek->getJadwalTayang(); ?></td>
            <td><?= $tiketObjek->getJumlahKursi(); ?> Kursi</td>
            <td>Rp <?= number_format($tiketObjek->getHargaDasar(), 0, ',', '.'); ?></td>
            <td class="harga-akhir">Rp <?= number_format($tiketObjek->hitungTotalHarga(), 0, ',', '.'); ?></td>
            <td><em><?= $tiketObjek->tampilkanInfoFasilitas(); ?></em></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
