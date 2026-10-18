<?php
// Panggil Header
require_once __DIR__ . '/../components/header.php';
?>

<!-- Hero Section / Banner Utama -->
<div class="p-5 mb-4 bg-white rounded-4 shadow-sm border-0 d-flex align-items-center justify-content-between flex-wrap">
    <div style="max-width: 600px;">
        <span class="badge mb-3 px-3 py-2 rounded-pill" style="background-color: #E9D8FD; color: #553C9A;">
            <i class="fa-solid fa-fire"></i> Selamat Datang di SISKAN Store
        </span>
        <h1 class="display-5 fw-bold" style="color: #6B46C1;">Lapar tapi Malas Mengantre? 🚀</h1>
        <p class="fs-6 text-muted my-3">
            Pesan makanan & minuman di kantin secara online dengan mudah. Tinggal pesan, bayar, dan ambil saat pesananmu sudah siap tanpa perlu mengantre panjang!
        </p>
        <div class="d-flex gap-3">
            <a href="index.php?page=products" class="btn text-white px-4 py-2 rounded-pill fw-semibold shadow-sm" style="background-color: #B83280;">
                <i class="fa-solid fa-burger me-2"></i> Lihat Semua Menu
            </a>
            <a href="index.php?page=categories" class="btn btn-outline-dark px-4 py-2 rounded-pill fw-semibold">
                <i class="fa-solid fa-list me-2"></i> Kategori Menu
            </a>
        </div>
    </div>
    <div class="mt-4 mt-md-0">
        <!-- Pastikan file gambar ilustrasi/hero ada di folder public -->
        <img src="/public/ayam-geprek.jpg" alt="Hero Image SISKAN" class="rounded-4 shadow" style="width: 320px; height: 220px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/320x220?text=SISKAN+Kantin';">
    </div>
</div>

<!-- Keunggulan Layanan -->
<div class="row text-center g-4 my-5">
    <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
            <div class="mb-3">
                <i class="fa-solid fa-bolt fs-1 text-warning"></i>
            </div>
            <h5 class="fw-bold">Tanpa Antre</h5>
            <p class="text-muted small">Pesan langsung dari perangkatmu, ambil makanan ketika statusnya sudah siap.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
            <div class="mb-3">
                <i class="fa-solid fa-utensils fs-1 text-success"></i>
            </div>
            <h5 class="fw-bold">Menu Bervariasi</h5>
            <p class="text-muted small">Tersedia berbagai pilihan makanan berat, minuman segar, hingga cemilan lezat.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
            <div class="mb-3">
                <i class="fa-solid fa-wallet fs-1 text-primary"></i>
            </div>
            <h5 class="fw-bold">Harga Terjangkau</h5>
            <p class="text-muted small">Ramah di kantong pelajar dan mahasiswa, pas untuk menemani aktivitas harian.</p>
        </div>
    </div>
</div>

<!-- Call to Action Tambahan -->
<div class="p-4 rounded-4 text-white text-center my-5 shadow-sm" style="background: linear-gradient(135deg, #6B46C1, #B83280);">
    <h3 class="fw-bold mb-2">Sudah Lapar? Yuk Pesan Sekarang!</h3>
    <p class="mb-4 text-white-50">Temukan menu favoritmu hari ini dan nikmati kemudahan memesan di kantin.</p>
    <a href="index.php?page=products" class="btn btn-light px-5 py-2 rounded-pill fw-bold text-dark shadow">
        Mulai Pesan <i class="fa-solid fa-arrow-right ms-2"></i>
    </a>
</div>

<?php
// Panggil Footer
require_once __DIR__ . '/../components/footer.php';
?>