<?php
function connect_db(){
    $host = 'db';
    $db = 'laravel';
    $charset = 'utf8';
    $port = '3306';
    $dsn = "mysql:host={$host}; dbname={$db}; charset={$charset}; port={$port}";

    $user = 'laravel';
    $pass = 'laravel';

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

$pdo = connect_db();

$sql = 'SHOW TABLES';
$stmt = $pdo->prepare($sql);
$stmt->execute();

//データベースの値を取得
$result = $stmt->fetchall();

var_dump($result);