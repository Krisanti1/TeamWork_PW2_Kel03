<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKAN - Pemesan Kantin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="top-bar bg-dark text-white py-1 px-3 small">
        <div class="container d-flex justify-content-between">
            <span><i class="fa-solid fa-clock"></i> Jam Operasional Kantin: 07.00 - 16.00 WIB</span>
            <span><i class="fa-solid fa-bullhorn"></i> Pesan online, ambil tanpa antre!</span>
        </div>
    </div>

    <header class="main-header navbar navbar-expand-lg bg-white shadow-sm py-3">
        <div class="container header-container">
            <a href="/index.php?page=home" class="brand-logo navbar-brand fw-bold text-decoration-none" style="color: #6B46C1;">
                <i class="fa-solid fa-utensils"></i> SISKAN<span style="color: #B83280;">.store</span>
            </a>

            <nav class="nav-menu navbar-nav mx-auto gap-3">
                <a href="/index.php?page=home" class="nav-link fw-semibold <?= (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active text-primary' : '' ?>">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
                <a href="/index.php?page=products" class="nav-link fw-semibold <?= (isset($_GET['page']) && $_GET['page'] == 'products') ? 'active text-primary' : '' ?>">
                    <a href="/index.php?page=products" class="nav-link fw-semibold">
                        <i class="fa-solid fa-burger"></i> Menu
                    </a>
                </a>
                <a href="/index.php?page=categories" class="nav-link fw-semibold <?= (isset($_GET['page']) && $_GET['page'] == 'categories') ? 'active text-primary' : '' ?>">
                    <i class="fa-solid fa-list"></i> Kategori
                </a>
            </nav>

            <div class="header-actions d-flex align-items-center gap-3">
                <a href="/index.php?page=cart" class="btn-cart position-relative text-dark text-decoration-none fs-5" title="Keranjang Belanja">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-badge badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle" style="font-size: 0.65rem;">
                        <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span>
                </a>

                <?php if (isset($_SESSION['user_nama'])): ?>
                    <span class="user-greeting small fw-semibold text-muted">Halo, <?= htmlspecialchars($_SESSION['user_nama']) ?></span>
                    <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
                        <a href="/index.php?page=admin_dashboard" class="btn btn-sm btn-outline-primary rounded-pill px-3">Dashboard</a>
                    <?php endif; ?>
                    <a href="/index.php?action=logout" class="btn btn-sm btn-outline-danger rounded-pill px-3"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
                <?php else: ?>
                    <a href="/index.php?page=login" class="btn btn-sm text-white rounded-pill px-4 fw-semibold" style="background-color: #B83280;"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="main-content container my-4">