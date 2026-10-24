<?php
class ProductController {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // Tampilkan Katalog Menu di Halaman Depan
    public function index() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY id DESC");
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $products = [];
        }
        require_once __DIR__ . '/../../views/pages/products.php';
    }

    // Ambil Semua Data Produk (Khusus Admin Dashboard)
    public function getAllProducts() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // CREATE: Tambah Produk Baru
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama     = trim($_POST['nama'] ?? '');
            $kategori = trim($_POST['kategori'] ?? '');
            $harga    = intval($_POST['harga'] ?? 0);
            $deskripsi= trim($_POST['deskripsi'] ?? '');
            $gambar   = trim($_POST['gambar'] ?? 'default.jpg');

            if (!empty($nama) && $harga > 0) {
                try {
                    $stmt = $this->conn->prepare("INSERT INTO products (nama, kategori, harga, deskripsi, gambar) VALUES (:nama, :kategori, :harga, :deskripsi, :gambar)");
                    $stmt->execute([
                        'nama'      => $nama,
                        'kategori'  => $kategori,
                        'harga'     => $harga,
                        'deskripsi' => $deskripsi,
                        'gambar'    => $gambar
                    ]);
                    echo "<script>alert('Menu berhasil ditambahkan!'); window.location.href='/index.php?page=admin_dashboard';</script>";
                    exit;
                } catch (PDOException $e) {
                    echo "<script>alert('Gagal menambah menu: " . addslashes($e->getMessage()) . "'); window.location.href='/index.php?page=admin_dashboard';</script>";
                    exit;
                }
            }
        }
    }

    // UPDATE: Perbarui Produk
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id       = intval($_POST['id'] ?? 0);
            $nama     = trim($_POST['nama'] ?? '');
            $kategori = trim($_POST['kategori'] ?? '');
            $harga    = intval($_POST['harga'] ?? 0);
            $deskripsi= trim($_POST['deskripsi'] ?? '');
            $gambar   = trim($_POST['gambar'] ?? 'default.jpg');

            if ($id > 0 && !empty($nama)) {
                try {
                    $stmt = $this->conn->prepare("UPDATE products SET nama = :nama, kategori = :kategori, harga = :harga, deskripsi = :deskripsi, gambar = :gambar WHERE id = :id");
                    $stmt->execute([
                        'id'        => $id,
                        'nama'      => $nama,
                        'kategori'  => $kategori,
                        'harga'     => $harga,
                        'deskripsi' => $deskripsi,
                        'gambar'    => $gambar
                    ]);
                    echo "<script>alert('Menu berhasil diperbarui!'); window.location.href='/index.php?page=admin_dashboard';</script>";
                    exit;
                } catch (PDOException $e) {
                    echo "<script>alert('Gagal mengubah menu'); window.location.href='/index.php?page=admin_dashboard';</script>";
                    exit;
                }
            }
        }
    }

    // DELETE: Hapus Produk
    public function destroy() {
        $id = intval($_GET['id'] ?? 0);
        if ($id > 0) {
            try {
                $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
                $stmt->execute(['id' => $id]);
                echo "<script>alert('Menu berhasil dihapus!'); window.location.href='/index.php?page=admin_dashboard';</script>";
                exit;
            } catch (PDOException $e) {
                echo "<script>alert('Gagal menghapus menu'); window.location.href='/index.php?page=admin_dashboard';</script>";
                exit;
            }
        }
    }
}