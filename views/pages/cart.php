<?php
$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;
$totalItems = 0;

foreach ($cart as $item) {
    $subtotal += $item['harga'] * $item['qty'];
    $totalItems += $item['qty'];
}

$biayaLayanan = !empty($cart) ? 1000 : 0;
$totalPembayaran = $subtotal + $biayaLayanan;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pesanan - SISKAN Store</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #6B46C1;">Keranjang Pesanan Saya</h2>
        <p class="text-muted">Periksa kembali daftar pesanan makanan & minumanmu sebelum checkout</p>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Tabel Daftar Pesanan -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead>
                            <tr class="text-muted border-bottom" style="font-size: 0.9rem;">
                                <th scope="col" style="width: 35%;">Menu</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center" style="width: 25%;">Jumlah</th>
                                <th scope="col" class="text-center">Subtotal</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($cart)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <p class="mb-2">Keranjang belanjaanmu masih kosong.</p>
                                        <a href="/index.php?page=products" class="btn btn-sm text-white rounded-pill px-3" style="background-color: #B83280;">
                                            Lihat Katalog Menu
                                        </a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($cart as $item): ?>
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="d-flex align-items-center py-2">
                                                <img src="<?= htmlspecialchars($item['gambar']) ?>" 
                                                     alt="<?= htmlspecialchars($item['nama']) ?>" 
                                                     class="rounded-3 me-3" 
                                                     style="width: 60px; height: 60px; object-fit: cover;"
                                                     onerror="this.src='https://via.placeholder.com/60?text=Menu';">
                                                <span class="fw-bold text-dark"><?= htmlspecialchars($item['nama']) ?></span>
                                            </div>
                                        </td>
                                        <td class="text-center text-muted">
                                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                        </td>
                                        
                                        <!-- Tombol - dan + untuk Mengatur Jumlah -->
                                        <td class="text-center">
                                            <div class="d-inline-flex align-items-center border rounded-pill p-1" style="background-color: #f8f9fa;">
                                                <!-- Tombol Kurangi (-) -->
                                                <a href="/index.php?action=decrease_qty&id=<?= urlencode($item['id']) ?>" 
                                                   class="btn btn-sm btn-light rounded-circle fw-bold d-flex align-items-center justify-content-center text-decoration-none" 
                                                   style="width: 28px; height: 28px; line-height: 1; border: 1px solid #dee2e6;">-</a>
                                                
                                                <!-- Angka Jumlah -->
                                                <span class="px-3 fw-bold small text-dark"><?= $item['qty'] ?></span>
                                                
                                                <!-- Tombol Tambah (+) -->
                                                <a href="/index.php?action=increase_qty&id=<?= urlencode($item['id']) ?>" 
                                                   class="btn btn-sm btn-light rounded-circle fw-bold d-flex align-items-center justify-content-center text-decoration-none" 
                                                   style="width: 28px; height: 28px; line-height: 1; border: 1px solid #dee2e6;">+</a>
                                            </div>
                                        </td>

                                        <td class="text-center fw-bold" style="color: #B83280;">
                                            Rp <?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="/index.php?action=remove_from_cart&id=<?= urlencode($item['id']) ?>" 
                                               class="btn btn-sm btn-outline-danger rounded-circle border-1 d-inline-flex align-items-center justify-content-center text-decoration-none" 
                                               style="width: 30px; height: 30px;" 
                                               title="Hapus Menu">&times;</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan Belanja -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold mb-4" style="color: #6B46C1;">Ringkasan Belanja</h5>
                
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Total Harga (<?= $totalItems ?> Menu)</span>
                    <span class="fw-semibold">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Biaya Layanan Kantin</span>
                    <span class="fw-semibold">Rp <?= number_format($biayaLayanan, 0, ',', '.') ?></span>
                </div>
                
                <hr>
                
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold fs-5">Total Pembayaran</span>
                    <span class="fw-bold fs-5" style="color: #B83280;">Rp <?= number_format($totalPembayaran, 0, ',', '.') ?></span>
                </div>

                <?php if (!empty($cart)): ?>
                    <a href="/index.php?page=order_detail" 
                       class="btn text-white w-100 py-2 rounded-pill fw-semibold text-decoration-none text-center" 
                       style="background-color: #B83280;">
                        Konfirmasi Checkout
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary w-100 py-2 rounded-pill fw-semibold" disabled>
                        Keranjang Kosong
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>