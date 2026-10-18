
<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "siskan_store";

    public function connect()
    {
        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $conn->set_charset("utf8mb4");

        return $conn;
    }
}
