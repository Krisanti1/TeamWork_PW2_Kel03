<?php
session_start();

// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/helpers/database.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

// Inisialisasi AuthController dengan koneksi database
$authController = new AuthController($conn);

// ===================================================
// 1. PENANGANAN AKSI (GET & POST ACTION)
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

    // --- FITUR CRUD PRODUK ADMIN ---
    if ($action === 'add_product') {
        $productController = new ProductController();
        $productController->store();
        exit;
    }

    if ($action === 'update_product') {
        $productController = new ProductController();
        $productController->update();
        exit;
    }

    if ($action === 'delete_product') {
        $productController = new ProductController();
        $productController->destroy();
        exit;
    }
}

// ===================================================
// 2. ROUTING HALAMAN (VIEW ROUTER)
// ===================================================
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$page = $_GET['page'] ?? 'home'; // Default ke 'home' jika tanpa parameter

if (str_contains($path, '/services')) {
    // Routing services jika ada
} elseif ($page === 'home') {
    // 1. Halaman Beranda / Home SISKAN Store
    require_once __DIR__ . '/../views/pages/home.php';
} elseif ($page === 'products') {
    // 2. Halaman Daftar Menu / Katalog Produk
    $controller = new ProductController();
    $controller->index();
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
} elseif ($page === 'admin_dashboard') {
    // Keamanan: Cek apakah user sudah login dan benar-benar admin
    if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
        echo "<script>alert('Akses ditolak! Anda bukan admin.'); window.location.href='/index.php?page=login';</script>";
        exit;
    }
    require_once __DIR__ . '/../views/pages/admin_dashboard.php';
} elseif ($page === 'categories') {
    require_once __DIR__ . '/../app/controllers/CategoryController.php';
    $controller = new CategoryController($conn);

    if (isset($_GET['kategori'])) {
        $controller->show($_GET['kategori']);
    } else {
        $controller->index();
    }
} else {
    // Fallback default jika parameter page tidak dikenal
    require_once __DIR__ . '/../views/pages/home.php';
}