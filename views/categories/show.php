
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu - SISKAN Store</title>
</head>
<body>
 
<h1>Menu <?= htmlspecialchars($categories) ?></h1>


    <a href="?page=categories">← Kembali ke Kategori</a>

    <?php if (empty($products)): ?>
        <p>Belum ada menu di kategori ini.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div>
                <h3><?= htmlspecialchars($product['nama']) ?></h3>
                <p><?= htmlspecialchars($product['deskripsi'] ?? '') ?></p>
                <strong>
                    Rp<?= number_format((int) $product['harga'], 0, ',', '.') ?>
                </strong>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
