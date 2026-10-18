<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kategori Menu - SISKAN Store</title>

    <style>

        body {

            font-family: Arial, sans-serif;

            background: #fff5fa;

            margin: 0;

            padding: 30px;

            color: #333;

        }



        h1 {

            color: #d63384;

        }



        .categories {

            display: flex;

            flex-wrap: wrap;

            gap: 20px;

        }



        .card {

            background: white;

            border: 1px solid #f2c6dc;

            border-radius: 15px;

            padding: 25px;

            width: 220px;

            box-sizing: border-box;

        }



        .card h2 {

            color: #d63384;

        }



        .card a {

            display: inline-block;

            background: #d63384;

            color: white;

            text-decoration: none;

            padding: 10px 15px;

            border-radius: 8px;

        }

    </style>

</head>

<body>

    <h1>🍽️ Kategori Menu SISKAN Store</h1>

    <p>Pilih kategori menu favoritmu.</p>



    <div class="categories">

        <?php if (empty($categories)): ?>

            <p>Belum ada kategori menu.</p>

        <?php else: ?>

            <?php foreach ($categories as $category): ?>

                <div class="card">

                    <h2>

                        <?= htmlspecialchars($category['kategori']) ?>

                    </h2>



                    <p><?= (int) $category['jumlah'] ?> menu tersedia</p>



                    <a href="?page=categories&amp;kategori=<?= urlencode($category['kategori']) ?>">

                        Lihat Menu

                    </a>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</body>

</html>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'Beranda';

switch ($page) {
    case 'home':
        require_once __DIR__ . '/views/pages/home.php';
        break;
    case 'products':
        require_once __DIR__ . '/views/pages/products.php';
        break;
    case 'categories':
        require_once __DIR__ . '/views/pages/categories.php'; // atau file kategori yang sesuai
        break;
    default:
        require_once __DIR__ . '/views/pages/home.php';
        break;
}
?>