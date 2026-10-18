<?php
session_start();

// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/helpers/database.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

// Pastikan koneksi $conn terkirim ke AuthController
$authController = new AuthController($conn);

// ===================================================
// 1. PENANGANAN AKSI / FORM PROSES (GET & POST ACTION)
// ===================================================
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // --- KERANJANG BELANJA ---
    if ($action === 'add_to_cart') {
        $id     = $_GET['id'] ?? '';
        $nama   = $_GET['nama'] ?? '';
        $harga  = intval($_GET['harga'] ?? 0);
        $gambar = $_GET['gambar'] ?? '';

        if ($id && $nama) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$id] = [
                    'id'     => $id,
                    'nama'   => $nama,
                    'harga'  => $harga,
                    'gambar' => $gambar,
                    'qty'    => 1
                ];
            }
        }
        header('Location: /index.php?page=cart');
        exit;
    }

    if ($action === 'increase_qty') {
        $id = $_GET['id'] ?? '';
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        }
        header('Location: /index.php?page=cart');
        exit;
    }

    if ($action === 'decrease_qty') {
        $id = $_GET['id'] ?? '';
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] -= 1;
            if ($_SESSION['cart'][$id]['qty'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: /index.php?page=cart');
        exit;
    }

    if ($action === 'remove_from_cart') {
        $id = $_GET['id'] ?? '';
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: /index.php?page=cart');
        exit;
    }

    // --- FITUR USER AUTHENTICATION ---
    if ($action === 'register_process') {
        $authController->register();
        exit;
    }

    if ($action === 'login_process') {
        $authController->login();
        exit;
    }

    if ($action === 'logout') {
        $authController->logout();
        exit;
    }
}

// ===================================================
// 2. ROUTING HALAMAN (VIEW ROUTER)
// ===================================================
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$page = $_GET['page'] ?? '';

if (str_contains($path, '/services')) {
    // Routing services jika ada
} elseif ($page === 'login') {
    $authController->loginForm();
} elseif ($page === 'register') {
    $authController->registerForm();
} elseif ($page === 'cart') {
    require_once __DIR__ . '/../views/pages/cart.php';
} elseif ($page === 'order_detail') {
    require_once __DIR__ . '/../views/pages/order_detail.php';
} elseif ($page === 'detail') {
    require_once __DIR__ . '/../views/pages/detail.php';
} elseif ($page === 'categories') {
    require_once __DIR__ . '/../app/controllers/CategoryController.php';
    $controller = new CategoryController($conn);

    if (isset($_GET['kategori'])) {
        $controller->show($_GET['kategori']);
    } else {
        $controller->index();
    }
} else {
    // Halaman Utama: Katalog Produk
    $controller = new ProductController();
    $controller->index();
}