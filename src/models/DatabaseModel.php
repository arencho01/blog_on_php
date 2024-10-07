<?php
namespace Blog\models;

    use PDO;

    header('Content-Type: text/html; charset=utf-8');

//    $pdo;
//    try {
//        $pdo = new PDO('mysql:host=mysql;dbname=my_db;charset=utf8mb4', 'user', '123456');
//    } catch (PDOException $e) {
//        echo 'Connection failed: ' . $e->getMessage();
//    }
//
//    $articles = $pdo->query("SELECT * FROM articles");
//    $row = $articles->fetch();
//
//    while ($article = $articles->fetch()) {
//        echo $article['title'] . '<br>';
//    }

class ServiceModel {
    private $host = "mysql";
    private $dbname = "my_db";
    private $user = "user";
    private $pass = "123456";
    private $charset = "utf8mb4";
    private $conn;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
        $this->conn = new PDO($dsn, $this->user, $this->pass);
    }

    public function query($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}