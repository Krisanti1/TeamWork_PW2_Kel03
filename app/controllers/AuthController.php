<?php
class AuthController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registerForm() {
        require_once __DIR__ . '/../../views/pages/register.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama     = trim($_POST['nama'] ?? '');
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($nama) || empty($username) || empty($password)) {
                echo "<script>alert('Semua kolom wajib diisi!'); window.location.href='/index.php?page=register';</script>";
                exit;
            }

            if (!$this->conn) {
                echo "<script>alert('Koneksi Database Gagal!'); window.location.href='/index.php?page=register';</script>";
                exit;
            }

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            try {
                $query = "INSERT INTO users (nama, username, password, role) VALUES (:nama, :username, :password, 'user')";
                $stmt  = $this->conn->prepare($query);
                
                $execute = $stmt->execute([
                    'nama'     => $nama, 
                    'username' => $username, 
                    'password' => $password_hashed
                ]);

                if ($execute) {
                    echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location.href='/index.php?page=login';</script>";
                    exit;
                }
            } catch (PDOException $e) {
                echo "<script>alert('Gagal Mendaftar (Username mungkin sudah digunakan): " . addslashes($e->getMessage()) . "'); window.location.href='/index.php?page=register';</script>";
                exit;
            }
        }
    }

    public function loginForm() {
        require_once __DIR__ . '/../../views/pages/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($username) || empty($password)) {
                echo "<script>alert('Username dan password tidak boleh kosong!'); window.location.href='/index.php?page=login';</script>";
                exit;
            }

            if (!$this->conn) {
                echo "<script>alert('Koneksi Database Gagal!'); window.location.href='/index.php?page=login';</script>";
                exit;
            }

            try {
                $query = "SELECT * FROM users WHERE username = :username";
                $stmt  = $this->conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->execute(['username' => $username]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['user_id']   = $user['id'];
                        $_SESSION['user_nama'] = $user['nama'];
                        $_SESSION['role']      = $user['role'] ?? 'user';

                        // Jika Admin -> Masuk ke Dashboard Admin
                        if ($_SESSION['role'] === 'admin') {
                            echo "<script>alert('Login Admin Berhasil! Selamat datang, " . addslashes($user['nama']) . "'); window.location.href='/index.php?page=admin_dashboard';</script>";
                            exit;
                        } 
                        // Jika User Biasa -> Masuk ke Halaman Beranda
                        else {
                            echo "<script>alert('Login Berhasil! Selamat datang, " . addslashes($user['nama']) . "'); window.location.href='/index.php?page=home';</script>";
                            exit;
                        }
                    }
                }
            } catch (PDOException $e) {
                // Error handling
            }

            echo "<script>alert('Username atau password salah!'); window.location.href='/index.php?page=login';</script>";
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_nama']);
        unset($_SESSION['role']);
        session_destroy();
        echo "<script>alert('Berhasil Logout.'); window.location.href='/index.php?page=login';</script>";
        exit;
    }
}