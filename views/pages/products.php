<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Kantin - SISKAN Store</title>
    
    <!-- 1. Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 2. Menghubungkan File CSS Kustom -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color: #f8f9fa;">

<?php
// Data 12 produk/menu kantin kampus
$products = [
    [
        'nama' => 'Tahu Goreng Crispy',
        'kategori' => 'Cemilan',
        'harga' => 5000,
        'gambar' => 'tahugoreng.jpg',
        'deskripsi' => 'Tahu goreng renyah gurih disajikan hangat dengan sambal kecap.'
    ],
    [
        'nama' => 'Nasi Goreng Spesial',
        'kategori' => 'Makanan',
        'harga' => 13000,
        'gambar' => 'nasi-goreng.jpg',
        'deskripsi' => 'Nasi goreng dengan bumbu khas, telur dadar, dan kerupuk renyah.'
    ],
    [
        'nama' => 'Ayam Geprek Sambal Korek',
        'kategori' => 'Makanan',
        'harga' => 15000,
        'gambar' => 'ayam-geprek.jpg',
        'deskripsi' => 'Ayam krispi digeprek dengan sambal korek pedas mantap + nasi.'
    ],
    [
        'nama' => 'Mie Goreng Kantin',
        'kategori' => 'Makanan',
        'harga' => 10000,
        'gambar' => 'mie-goreng.jpg',
        'deskripsi' => 'Mie goreng lezat dengan pilihan telur ceplok atau dadar.'
    ],
    [
        'nama' => 'Bakso Kuah Sapi',
        'kategori' => 'Makanan',
        'harga' => 12000,
        'gambar' => 'bakso.jpg',
        'deskripsi' => 'Bakso daging sapi kenyal dengan kuah kaldu hangat dan bihun.'
    ],
    [
        'nama' => 'Soto Ayam Madura',
        'kategori' => 'Makanan',
        'harga' => 14000,
        'gambar' => 'soto-ayam.jpg',
        'deskripsi' => 'Soto ayam berkuah kuning gurih segar lengkap dengan koya dan nasi.'
    ],
    [
        'nama' => 'Es Teh Manis',
        'kategori' => 'Minuman',
        'harga' => 3000,
        'gambar' => 'es-teh.jpg',
        'deskripsi' => 'Es teh segar dingin pelepas dahaga setelah kuliah.'
    ],
    [
        'nama' => 'Es Jeruk Peras',
        'kategori' => 'Minuman',
        'harga' => 5000,
        'gambar' => 'es-jeruk.jpg',
        'deskripsi' => 'Sari jeruk asli peras kaya vitamin C, asam manis segar.'
    ],
    [
        'nama' => 'Kopi Hitam / Susu',
        'kategori' => 'Minuman',
        'harga' => 4000,
        'gambar' => 'kopi.jpg',
        'deskripsi' => 'Seduhan kopi nikmat penahan kantuk saat nugas.'
    ],
    [
        'nama' => 'Matcha Latte Ice',
        'kategori' => 'Minuman',
        'harga' => 8000,
        'gambar' => 'matcha.jpg',
        'deskripsi' => 'Minuman matcha hijau creamy dan manis dingin penambah semangat.'
    ],
    [
        'nama' => 'Roti Bakar Cokelat Keju',
        'kategori' => 'Cemilan',
        'harga' => 8000,
        'gambar' => 'roti-bakar.jpg',
        'deskripsi' => 'Roti bakar empuk isi topping cokelat lumer dan parutan keju.'
    ],
    [
        'nama' => 'Pisang Cokelat Lumer',
        'kategori' => 'Cemilan',
        'harga' => 6000,
        'gambar' => 'piscok.jpg',
        'deskripsi' => 'Pisang cokelat goreng crispy dengan keju dan saus cokelat.'
    ]
];
?>

<?php
// 1. Panggil Header di paling atas
require_once __DIR__ . '/../components/header.php';
?>


<div class="container my-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #6B46C1;">Daftar Menu Kantin</h2>
        <p class="text-muted">Pilih makanan, minuman, dan cemilan favoritmu di SISKAN Store</p>
    </div>

    <!-- Grid Produk (3 Kolom) -->
    <div class="row g-4">
        <?php foreach ($products as $index => $item): ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <!-- Foto Produk -->
                    <img src="/<?= $item['gambar']; ?>" 
                         class="card-img-top" 
                         alt="<?= htmlspecialchars($item['nama']); ?>" 
                         style="height: 200px; object-fit: cover;"
                         onerror="this.src='https://via.placeholder.com/300x200?text=Kantin+SISKAN';">
                    
                    <div class="card-body d-flex flex-column p-4">
                        <!-- Badge Kategori -->
                        <span class="badge mb-2 px-3 py-2 align-self-start rounded-pill" 
                              style="background-color: #E9D8FD; color: #553C9A;">
                            <?= htmlspecialchars($item['kategori']); ?>
                        </span>
                        
                        <!-- Nama & Deskripsi -->
                        <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($item['nama']); ?></h5>
                        <p class="card-text text-muted small mb-4"><?= htmlspecialchars($item['deskripsi']); ?></p>
                        
                        <!-- Harga & Tombol Pesan Dinamis -->
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5" style="color: #B83280;">
                                Rp <?= number_format($item['harga'], 0, ',', '.'); ?>
                            </span>
                            
                            <a href="/index.php?action=add_to_cart&id=<?= $index + 1 ?>&nama=<?= urlencode($item['nama']) ?>&harga=<?= $item['harga'] ?>&gambar=<?= urlencode('/' . $item['gambar']) ?>" 
                               class="btn text-white px-3 rounded-pill fw-semibold btn-pesan text-decoration-none" 
                               style="background-color: #B83280;"
                               data-nama="<?= htmlspecialchars($item['nama']); ?>">
                                + Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
// 3. Panggil Footer di paling bawah
require_once __DIR__ . '/../components/footer.php';
?>

<!-- 3. Menghubungkan File JavaScript Kustom -->
<script src="/js/app.js"></script>

</body>
</html>