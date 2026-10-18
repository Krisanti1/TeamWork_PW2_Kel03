
<?php

require_once __DIR__ . '/../app/helpers/database.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_contains($path, '/services')) {

    // Routing services yang sudah ada dipertahankan.

} elseif (($_GET['page'] ?? '') === 'categories') {

    require_once __DIR__ . '/../app/controllers/CategoryController.php';

    $controller = new CategoryController($conn);

    if (isset($_GET['kategori'])) {
        $controller->show($_GET['kategori']);
    } else {
        $controller->index();
    }

} else {

    $controller = new ProductController();
    $controller->index();

}
