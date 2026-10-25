<?php
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    echo "<script>alert('Akses Ditolak!'); window.location.href='/index.php?page=login';</script>";
    exit;
}

$productController = new ProductController();
$products = $productController->getAllProducts();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SISKAN Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- NAVBAR ADMIN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                <i class="fa-solid fa-user-shield text-warning"></i> Panel Admin SISKAN Store
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">Halo, <b><?= htmlspecialchars($_SESSION['user_nama'] ?? 'Admin') ?></b></span>
                <a href="/index.php?page=home" class="btn btn-outline-light btn-sm rounded-pill"><i class="fa-solid fa-eye me-1"></i> Lihat Toko</a>
                <a href="/index.php?action=logout" class="btn btn-danger btn-sm rounded-pill"><i class="fa-solid fa-right-from-bracket me-1"></i> Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color: #6B46C1;">Kelola Menu Kantin (CRUD)</h3>
                <p class="text-muted small mb-0">Tambah, ubah, atau hapus menu makanan dan minuman kantin.</p>
            </div>
            <button class="btn text-white rounded-pill px-4 fw-semibold shadow-sm" style="background-color: #B83280;" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="fa-solid fa-plus me-1"></i> Tambah Menu Baru
            </button>
        </div>

        <!-- TABEL DAFTAR MENU -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Foto</th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data menu. Silakan tambah menu baru.</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach ($products as $item): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold"><?= $no++ ?></td>
                                        <td>
                                            <img src="<?= htmlspecialchars($item['gambar']) ?>" alt="img" class="rounded-3 shadow-sm" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/50'">
                                        </td>
                                        <td class="fw-semibold"><?= htmlspecialchars($item['nama']) ?></td>
                                        <td><span class="badge bg-info text-dark rounded-pill px-3"><?= htmlspecialchars($item['kategori'] ?? 'Umum') ?></span></td>
                                        <td class="fw-bold text-success">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                        <td class="small text-muted" style="max-width: 250px;"><?= htmlspecialchars($item['deskripsi'] ?? '-') ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-warning btn-sm rounded-circle me-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $item['id'] ?>" title="Edit">
                                                <i class="fa-solid fa-pen text-white"></i>
                                            </button>
                                            <a href="/index.php?action=delete_product&id=<?= $item['id'] ?>" class="btn btn-danger btn-sm rounded-circle" onclick="return confirm('Apakah kamu yakin ingin menghapus menu ini?')" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT PRODUK -->
                                    <div class="modal fade" id="modalEdit<?= $item['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 border-0">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold">Edit Menu Makanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="/index.php?action=update_product" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                        <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($item['gambar']) ?>">
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label small">Nama Menu</label>
                                                            <input type="text" name="nama" class="form-control rounded-3" value="<?= htmlspecialchars($item['nama']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small">Kategori</label>
                                                            <select name="kategori" class="form-select rounded-3">
                                                                <option value="Makanan" <?= ($item['kategori'] ?? '') === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                                                <option value="Minuman" <?= ($item['kategori'] ?? '') === 'Minuman' ? 'selected' : '' ?>>Minuman</option>
                                                                <option value="Cemilan" <?= ($item['kategori'] ?? '') === 'Cemilan' ? 'selected' : '' ?>>Cemilan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small">Harga (Rp)</label>
                                                            <input type="number" name="harga" class="form-control rounded-3" value="<?= $item['harga'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small">Ganti Foto Menu (.jpg, .jpeg, .png)</label>
                                                            <input type="file" name="gambar" class="form-control rounded-3" accept=".jpg, .jpeg, .png">
                                                            <div class="form-text small">Biarkan kosong jika tidak ingin mengubah foto.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small">Deskripsi</label>
                                                            <textarea name="deskripsi" class="form-control rounded-3" rows="3"><?= htmlspecialchars($item['deskripsi'] ?? '') ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH PRODUK -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="color: #6B46C1;">Tambah Menu Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/index.php?action=add_product" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small">Nama Menu</label>
                            <input type="text" name="nama" class="form-control rounded-3" placeholder="Contoh: Nasi Goreng Spesial" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Kategori</label>
                            <select name="kategori" class="form-select rounded-3">
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Cemilan">Cemilan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control rounded-3" placeholder="15000" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Upload Foto Menu (.jpg, .jpeg, .png)</label>
                            <input type="file" name="gambar" class="form-control rounded-3" accept=".jpg, .jpeg, .png" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control rounded-3" rows="3" placeholder="Penjelasan singkat menu..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white rounded-pill px-4" style="background-color: #B83280;">Simpan Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>