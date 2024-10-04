<?php

//    header('Content-Type: text/html; charset=utf-8');

    $pdo;
    try {
        $pdo = new PDO('mysql:host=mysql;dbname=my_db;charset=utf8mb4', 'user', '123456');
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    $articles = $pdo->query("SELECT * FROM articles");
    $row = $articles->fetch();

    while($article = $articles->fetch()) {
        echo $article['title'] . '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../favicon.ico">

    <title>Блог</title>
</head>
<body>
    <h2>Hello world</h2>

    <div>

    </div>
</body>
</html>
