CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `kategori` ENUM('Makanan', 'Minuman', 'Cemilan') NOT NULL,
  `harga` INT NOT NULL,
  `deskripsi` TEXT NULL,
  `gambar` VARCHAR(255) DEFAULT 'default.jpg',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh Data Awal
INSERT INTO `products` (`nama`, `kategori`, `harga`, `deskripsi`, `gambar`) VALUES
('Tahu Goreng Crispy', 'Cemilan', 5000, 'Tahu goreng renyah disajikan dengan sambal kecap pedas.', 'tahu-goreng.jpg'),
('Nasi Goreng Kantin', 'Makanan', 12000, 'Nasi goreng spesial dengan telur dadar dan kerupuk.', 'nasi-goreng.jpg'),
('Es Teh Manis', 'Minuman', 3000, 'Es teh manis segar pelepas dahaga.', 'es-teh.jpg');