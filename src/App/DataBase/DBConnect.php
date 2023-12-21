<?php
namespace DataBase;

use PDO;

class DBConnect
{
    public PDO $conn;

    public function connectBdd(): \PDO
    {
        $dsn = 'mysql:host=localhost;dbname=fridgeDB';
        $username = 'admin';
        $password = 'admin';
        try {
            $bdd = new \PDO($dsn, $username, $password);
            return $bdd;
        } catch (\PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    public function __construct()
    {
        $this-> conn = $this->connectBdd();
    }
}
