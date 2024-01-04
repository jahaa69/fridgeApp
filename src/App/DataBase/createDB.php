<?php

namespace DataBase;

$dsn = 'mysql:host=172.19.0.2;dbname=fridgeDB';
$username = 'admin';
$password = 'admin';
try {
    $bdd = new \PDO($dsn, $username, $password);
    $conn = $bdd;
} catch (\PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$alliment = $conn->prepare("CREATE TABLE IF NOT EXISTS alliment(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
  					quantity INT(6),
            date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            delete_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )");
$alliment->execute();
