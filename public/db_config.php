<?php

	// constants 
    define("host_ip", "db"); // 127.0.0.1
    define("username", "root");
    define("password", "laravel");
    define("database", "cc");

	$conn = mysqli_connect(host_ip, username, password, database);

	if(!$conn){
		echo "Debugging error nomber: " . mysqli_connect_errno();
		echo "<br>";
		echo "Debugging error: ". mysqli_connect_error();
		exit;
	}


// function connect_db(){
// 	$host = 'db';
// 	$db = 'cc';
// 	$charset = 'utf8';
// 	$port = '3306';
// 	$dsn = "mysql:host={$host}; dbname={$db}; charset={$charset}; port={$port}";

// 	$user = 'laravel';
// 	$pass = 'laravel';

// 	$options = [
// 		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
// 		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// 		PDO::ATTR_EMULATE_PREPARES   => false,
// 	];

// 	try {
// 		return new PDO($dsn, $user, $pass, $options);
// 	} catch(PDOException $e) {
// 		echo $e->getMessage();
// 	}
// }

// $pdo = connect_db();

// $sql = 'SHOW TABLES';
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

// $result = $stmt->fetchall();

// var_dump($result);


?>
