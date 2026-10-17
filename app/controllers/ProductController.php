<?php

class ProductController {
    
    public function __construct() {
        // Konstruktor kosong agar tidak error argumen
    }

    public function index() {
        // Sesuaikan path jalur foldernya keluar satu tingkat lagi ke root, lalu masuk ke views/pages/products.php
        require_once __DIR__ . '/../../views/pages/products.php';
    }
}