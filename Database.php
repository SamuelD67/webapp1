<?php
require 'db_connect.php';

class Database {
    private $pdo;

    public function __construct($host, $dbname, $dbUsername, $dbPassword) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

$db = new Database('127.0.0.1', 'restaurant', 'root', '');
?>