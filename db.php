<?php
class DatabaseConnection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "country_without_borders_db";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            error_log($e->getMessage(), 3, "errors.log");
            echo "Произошла ошибка подключения. Пожалуйста, попробуйте позже.";
            exit();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

// Создаем объект подключения
$db = new DatabaseConnection();
$conn = $db->getConnection();
?>
