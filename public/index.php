<?php
session_start();

require_once __DIR__ . '/../app/helpers/database.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

// --- PROSES TAMBAH KE KERANJANG DARI KATALOG ---
if (isset($_GET['action']) && $_GET['action'] === 'add_to_cart') {
    $id = $_GET['id'] ?? '';
    $nama = $_GET['nama'] ?? '';
    $harga = intval($_GET['harga'] ?? 0);
    $gambar = $_GET['gambar'] ?? '';

    if ($id && $nama) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'nama' => $nama,
                'harga' => $harga,
                'gambar' => $gambar,
                'qty' => 1
            ];
        }
    }

    header('Location: /index.php?page=cart');
    exit;
}

// --- PROSES TAMBAH JUMLAH (+1) DI KERANJANG ---
if (isset($_GET['action']) && $_GET['action'] === 'increase_qty') {
    $id = $_GET['id'] ?? '';
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1;
    }
    header('Location: /index.php?page=cart');
    exit;
}

// --- PROSES KURANGI JUMLAH (-1) DI KERANJANG ---
if (isset($_GET['action']) && $_GET['action'] === 'decrease_qty') {
    $id = $_GET['id'] ?? '';
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] -= 1;
        // Jika jumlah menjadi 0 atau kurang, hapus item dari keranjang
        if ($_SESSION['cart'][$id]['qty'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
    header('Location: /index.php?page=cart');
    exit;
}

// --- PROSES HAPUS ITEM DARI KERANJANG ---
if (isset($_GET['action']) && $_GET['action'] === 'remove_from_cart') {
    $id = $_GET['id'] ?? '';
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header('Location: /index.php?page=cart');
    exit;
}

// --- ROUTING HALAMAN ---
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_contains($path, '/services')) {

    // Routing services jika ada

} elseif (($_GET['page'] ?? '') === 'categories') {

    require_once __DIR__ . '/../app/controllers/CategoryController.php';
    $controller = new CategoryController($conn);

    if (isset($_GET['kategori'])) {
        $controller->show($_GET['kategori']);
    } else {
        $controller->index();
    }

} elseif (($_GET['page'] ?? '') === 'detail') {

    require_once __DIR__ . '/../views/pages/detail.php';

} elseif (($_GET['page'] ?? '') === 'cart') {

    require_once __DIR__ . '/../views/pages/cart.php';

} elseif (($_GET['page'] ?? '') === 'order_detail') {

    require_once __DIR__ . '/../views/pages/order_detail.php';

} else {

    $controller = new ProductController();
    $controller->index();

}