<?php
// Tahap 3: Implementasi Abstraksi (Abstraction)
abstract class Tiket {
    // Properti Terenkapsulasi (protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Constructor untuk memetakan nilai dari kolom tabel database
    public function __construct($id, $film, $jadwal, $kursi, $hargaDasar) {
        $this->id_tiket = $id;
        $this->nama_film = $film;
        $this->jadwal_tayang = $jadwal;
        $this->jumlah_kursi = $kursi;
        $this->hargaDasarTiket = $hargaDasar;
    }

    // Metode Abstrak (Tanpa Isi/Body)
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter pembantu untuk menampilkan data umum di tabel HTML
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
    public function getHargaDasar() { return $this->hargaDasarTiket; }
}

// Tahap 4: Implementasi Pewarisan (Inheritance)

// 1. TiketRegular
class TiketRegular extends Tiket {
    // Properti tambahan khusus kelas studio reguler
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id, $film, $jadwal, $kursi, $hargaDasar, $audio, $baris) {
        parent::__construct($id, $film, $jadwal, $kursi, $hargaDasar);
        $this->tipeAudio = $audio;
        $this->lokasiBaris = $baris;
    }

    public function hitungTotalHarga() {
        // Regular tidak ada biaya tambahan, total = harga dasar * jumlah kursi
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipeAudio . " | Baris: " . $this->lokasiBaris;
    }
}

// 2. TiketIMAX
class TiketIMAX extends Tiket {
    // Properti tambahan khusus kelas studio IMAX
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id, $film, $jadwal, $kursi, $hargaDasar, $kacamataId, $efekGerak) {
        parent::__construct($id, $film, $jadwal, $kursi, $hargaDasar);
        $this->kacamata3dId = $kamarId ?? 'Tidak Ada';
        $this->efekGerakFitur = $efekGerak ?? 'Standar';
    }

    public function hitungTotalHarga() {
        // IMAX ada tambahan biaya teknologi Rp 25.000 per kursi
        $biayaTambahan = 25000 * $this->jumlah_kursi;
        return ($this->hargaDasarTiket * $this->jumlah_kursi) + $biayaTambahan;
    }

    public function tampilkanInfoFasilitas() {
        return "Kacamata ID: " . $this->kacamata3dId . " | Efek: " . $this->efekGerakFitur;
    }
}

// 3. TiketVelvet
class TiketVelvet extends Tiket {
    // Properti tambahan khusus kelas studio Velvet
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $kursi, $hargaDasar, $bantalSelimut, $butler) {
        parent::__construct($id, $film, $jadwal, $kursi, $hargaDasar);
        $this->bantalSelimutPack = $bantalSelimut == 1 ? "Termasuk" : "Tidak";
        $this->layananButler = $butler == 1 ? "Aktif" : "Tidak";
    }

    public function hitungTotalHarga() {
        // Velvet ada tambahan layanan premium Rp 100.000 per kursi
        $biayaPremium = 100000 * $this->jumlah_kursi;
        return ($this->hargaDasarTiket * $this->jumlah_kursi) + $biayaPremium;
    }

    public function tampilkanInfoFasilitas() {
        return "Bantal/Selimut: " . $this->bantalSelimutPack . " | Butler Service: " . $this->layananButler;
    }
}

// Class Manager untuk fetching database menggunakan link objek koneksi luar
class DataTiket {
    private $db;
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }
    public function ambilSemuaTiket() {
        $query = "SELECT * FROM tabel_tiket";
        return $this->db->query($query);
    }
}
?>
