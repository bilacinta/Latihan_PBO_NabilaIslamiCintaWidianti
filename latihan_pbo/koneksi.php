<?php
class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_latihan_pbo_ti1d_nabilaislamicintaw";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Method pembantu untuk mengambil objek koneksi inti jika dibutuhkan luar class
    public function getKoneksi() {
        return $this->conn;
    }
}

// === MEMBUAT OBJEK KONEKSI (Uji Coba Langsung) ===
// Kode di bawah ini membuat instance/objek baru bernama $tesKoneksi
$tesKoneksi = new Koneksi(); 
if ($tesKoneksi->getKoneksi()) {
    // Pesan ini akan muncul di paling atas halaman web jika koneksi berhasil
    echo "<div style='color: green; background: #e8f5e9; padding: 10px; margin-bottom: 10px; border-radius: 4px;'>
            <strong>Sukses:</strong> Objek koneksi berhasil dibuat dan terhubung ke database db_latihan_pbo!
          </div>";
}


?>
