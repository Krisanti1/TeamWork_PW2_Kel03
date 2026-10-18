
<?php

class CategoryModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCategories()
    {
        $sql = "SELECT kategori, COUNT(*) AS jumlah
                FROM products
                GROUP BY kategori
                ORDER BY kategori ASC";

        $result = $this->conn->query($sql);

        if (!$result) {
            return [];
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByCategory($kategori)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM products
             WHERE kategori = ?
             ORDER BY nama ASC"
        );

        if (!$stmt) {
            return [];
        }

        $stmt->bind_param("s", $kategori);
        $stmt->execute();

        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $products;
    }
}
