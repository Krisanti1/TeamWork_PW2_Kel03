
<?php

require_once __DIR__ . '/../models/CategoryModel.php';

class CategoryController
{
    private $model;

    public function __construct($conn)
    {
        $this->model = new CategoryModel($conn);
    }

    public function index()
    {
        $categories = $this->model->getCategories();

        require __DIR__ . '/../views/categories/index.php';
    }

    public function show($kategori)
    {
        $validCategories = ['Makanan', 'Minuman', 'Cemilan'];

        if (!in_array($kategori, $validCategories, true)) {
            http_response_code(404);
            exit('Kategori tidak ditemukan.');
        }

        $categories = $this->model->getCategories();
        $products = $this->model->getProductsByCategory($kategori);

        require __DIR__ . '/../views/categories/show.php';
    }
}
