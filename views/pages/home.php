<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SISKAN Store</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- File CSS Lokal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <!-- Top Announcement Bar -->
    <div class="bg-dark text-white py-2 px-3 fs-7">
        <div class="container d-flex justify-content-between align-items-center flex-wrap small">
            <span><i class="fa-solid fa-clock me-1"></i> Jam Operasional Kantin: 07.00 - 16.00 WIB</span>
            <span><i class="fa-solid fa-bullhorn me-1"></i> Pesan online, ambil tanpa antre!</span>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2" href="/index.php?page=home" style="color: #6B46C1;">
                <i class="fa-solid fa-utensils"></i> SISKAN<span style="color: #B83280;">.store</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-3 my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold active text-primary" href="/index.php?page=home">
                            <i class="fa-solid fa-house me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-secondary" href="/index.php?page=products">
                            <i class="fa-solid fa-burger me-1"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-secondary" href="/index.php?page=categories">
                            <i class="fa-solid fa-list me-1"></i> Kategori
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="/index.php?page=cart" class="position-relative text-dark text-decoration-none fs-5 me-2" title="Keranjang Belanja">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                        </span>
                    </a>

                    <?php if (isset($_SESSION['user_nama'])): ?>
                        <span class="fw-semibold small text-muted">Halo, <?= htmlspecialchars($_SESSION['user_nama']) ?></span>
                        <a href="/index.php?action=logout" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="fa-solid fa-right-from-bracket me-1"></i> Keluar</a>
                    <?php else: ?>
                        <a href="/index.php?page=login" class="btn text-white btn-sm rounded-pill px-4 fw-semibold" style="background-color: #B83280;">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="container my-5">
        <div class="p-5 text-white rounded-4 shadow-sm" style="background: linear-gradient(135deg, #6B46C1, #B83280);">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-white text-dark mb-3 px-3 py-2 rounded-pill fw-medium">🚀 Selamat Datang di SISKAN Store</span>
                    <h1 class="display-4 fw-bold mb-3">Lapar tapi Malas Mengantre?</h1>
                    <p class="fs-5 mb-4 opacity-90">Pesan makanan & minuman di kantin secara online dengan mudah. Tinggal pesan, bayar, dan ambil saat pesananmu sudah siap tanpa perlu mengantre panjang!</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="/index.php?page=products" class="btn btn-light btn-lg rounded-pill px-4 fw-bold shadow-sm" style="color: #6B46C1;">
                            <i class="fa-solid fa-burger me-2"></i>Lihat Semua Menu
                        </a>
                        <a href="/index.php?page=categories" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-semibold">
                            <i class="fa-solid fa-list me-2"></i>Kategori Menu
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block mt-4 mt-lg-0">
                    <div class="bg-white bg-opacity-10 p-5 rounded-4 border border-light border-opacity-25 shadow-lg">
                        <i class="fa-solid fa-shop display-1 text-white opacity-75"></i>
                        <h4 class="mt-3 fw-bold">SISKAN Kantin</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN / FITUR -->
    <section class="container my-5">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-bolt fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Tanpa Antre</h5>
                    <p class="text-muted small mb-0">Pesan langsung dari perangkatmu, ambil makanan ketika statusnya sudah siap.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-utensils fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Menu Bervariasi</h5>
                    <p class="text-muted small mb-0">Tersedia berbagai pilihan makanan berat, minuman segar, hingga cemilan lezat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="d-inline-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-wallet fs-3"></i>
                    </div>
                    <h5 class="fw-bold">Harga Terjangkau</h5>
                    <p class="text-muted small mb-0">Ramah di kantong pelajar dan mahasiswa, pas untuk menemani aktivitas harian.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION BANNER -->
    <section class="container my-5 mb-5">
        <div class="p-4 p-md-5 text-center text-white rounded-4 shadow-sm" style="background-color: #6B46C1;">
            <h3 class="fw-bold mb-2">Sudah Lapar? Yuk Pesan Sekarang!</h3>
            <p class="mb-4 opacity-75">Temukan menu favoritmu hari ini dan nikmati kemudahan memesan di kantin.</p>
            <a href="/index.php?page=products" class="btn btn-light rounded-pill px-5 py-2 fw-bold shadow-sm" style="color: #6B46C1;">
                Mulai Pesan <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>