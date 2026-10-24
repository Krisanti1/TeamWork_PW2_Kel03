<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKAN - Pemesan Kantin</title>
    
    <!-- Google Fonts & FontAwesome Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- File CSS Utama -->
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

    <!-- Top Announcement Bar (Opsional) -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <span><i class="fa-solid fa-clock"></i> Jam Operasional Kantin: 07.00 - 16.00 WIB</span>
            <span><i class="fa-solid fa-bullhorn"></i> Pesan online, ambil tanpa antre!</span>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="main-header">
        <div class="container header-container">
            <!-- Logo App -->
            <a href="/" class="brand-logo">
                <i class="fa-solid fa-utensils"></i>
                <span class="logo-text">SISKAN<span>.store</span></span>
            </a>

            <!-- Navigation Links -->
            <nav class="nav-menu">
                <a href="index.php" class="nav-link <?= (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : '' ?>">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
                <a href="/index.php?page=products" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'products') ? 'active' : '' ?>">
                    <i class="fa-solid fa-burger"></i> Menu
                </a>
                <a href="index.php?page=categories" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'categories') ? 'active' : '' ?>">
                    <i class="fa-solid fa-list"></i> Kategori
                </a>
            </nav>
            <!--<a href="/index.php?page=products" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'categories') ? 'active' : '' ?>">
                    <i class="fa-solid fa-list"></i> Katalog
                </a>

            <!-- User Action Buttons -->
            <div class="header-actions">
                <a href="/index.php?page=cart" class="btn-cart" title="Keranjang Belanja">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-badge">3</span>
                </a>
                <a href="/index.php?page=login" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
            </div>
        </div>
    </header>

    <main class="main-content container">