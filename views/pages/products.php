<?php
// Pastikan header dimuat
require_once __DIR__ . '/../components/header.php';
?>

<div class="container my-4">
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #6B46C1;"><i class="fa-solid fa-burger me-2"></i> Daftar Menu Kantin</h2>
        <p class="text-muted">Pilih menu favoritmu dan pesan sekarang secara online!</p>
    </div>

    <div class="row g-4">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada menu yang tersedia saat ini.</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $item): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <!-- Foto Produk -->
                        <img src="<?= htmlspecialchars($item['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nama']) ?>" style="height: 180px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/300x180?text=SISKAN.store'">
                        
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-light text-primary border rounded-pill align-self-start mb-2 px-3 small">
                                <?= htmlspecialchars($item['kategori'] ?? 'Umum') ?>
                            </span>
                            <h5 class="card-title fw-bold text-dark mb-1"><?= htmlspecialchars($item['nama']) ?></h5>
                            <p class="text-muted small mb-3 flex-grow-1"><?= htmlspecialchars($item['deskripsi'] ?? '-') ?></p>
                            
                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="fw-bold text-success">Rp <?= number_format($item['harga'], 0, ',', '.') ?></span>
                                <!-- Tombol Pesan / Tambah ke Keranjang -->
                                <a href="/index.php?action=add_to_cart&id=<?= $item['id'] ?>&nama=<?= urlencode($item['nama']) ?>&harga=<?= $item['harga'] ?>&gambar=<?= urlencode($item['gambar']) ?>" class="btn btn-sm text-white rounded-pill px-3 fw-semibold" style="background-color: #B83280;">
                                    <i class="fa-solid fa-cart-plus me-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../components/footer.php';
?>