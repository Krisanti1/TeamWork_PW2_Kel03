<?php
class AuthController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Menampilkan halaman Form Register
    public function registerForm() {
        require_once __DIR__ . '/../../views/pages/register.php';
    }

    // Proses Simpan Registrasi User
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama     = trim($_POST['nama'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($nama) || empty($email) || empty($password)) {
                echo "<script>alert('Semua kolom wajib diisi!'); window.location.href='/index.php?page=register';</script>";
                exit;
            }

            if (!$this->conn) {
                echo "<script>alert('Koneksi Database Gagal! Periksa koneksi MySQL Anda.'); window.location.href='/index.php?page=register';</script>";
                exit;
            }

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            try {
                $query = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
                $stmt  = $this->conn->prepare($query);
                
                if ($stmt === false) {
                    echo "<script>alert('Gagal Prepare Query: Pastikan tabel users sudah dibuat di phpMyAdmin.'); window.location.href='/index.php?page=register';</script>";
                    exit;
                }
                
                $execute = $stmt->execute([
                    'nama'     => $nama, 
                    'email'    => $email, 
                    'password' => $password_hashed
                ]);

                if ($execute) {
                    echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location.href='/index.php?page=login';</script>";
                    exit;
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "<script>alert('Gagal menyimpan data: " . addslashes($errorInfo[2]) . "'); window.location.href='/index.php?page=register';</script>";
                    exit;
                }
            } catch (PDOException $e) {
                echo "<script>alert('Gagal Mendaftar (Email mungkin sudah terdaftar): " . addslashes($e->getMessage()) . "'); window.location.href='/index.php?page=register';</script>";
                exit;
            }
        }
    }

    // Menampilkan halaman Form Login
    public function loginForm() {
        require_once __DIR__ . '/../../views/pages/login.php';
    }

    // Proses Autentikasi Login User
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($email) || empty($password)) {
                echo "<script>alert('Email dan password tidak boleh kosong!'); window.location.href='/index.php?page=login';</script>";
                exit;
            }

            if (!$this->conn) {
                echo "<script>alert('Koneksi Database Gagal!'); window.location.href='/index.php?page=login';</script>";
                exit;
            }

            try {
                $query = "SELECT * FROM users WHERE email = :email";
                $stmt  = $this->conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->execute(['email' => $email]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['user_id']   = $user['id'];
                        $_SESSION['user_nama'] = $user['nama'];
                        echo "<script>alert('Login Berhasil! Selamat datang, " . addslashes($user['nama']) . "'); window.location.href='/index.php?page=products';</script>";
                        exit;
                    }
                }
            } catch (PDOException $e) {
                // Handle exception
            }

            echo "<script>alert('Email atau password salah!'); window.location.href='/index.php?page=login';</script>";
            exit;
        }
    }

    // Proses Logout User
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_nama']);
        echo "<script>alert('Berhasil Logout.'); window.location.href='/index.php?page=login';</script>";
        exit;
    }
}