<?php

namespace Model;

use PDO;

class fridgeModel
{

    public PDO $conn;

    public function connectBdd(): \PDO
    {
        $dsn = 'mysql:host=mysql;dbname=fridgeDB';
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
        $this->conn = $this->connectBdd();
    }


    public function addAlliment($name, $quantity)
    {
        $sql = "INSERT INTO alliment (name, quantity) VALUES ('$name', '$quantity')";
        $this->conn->exec($sql);
    }

    public function getAlliment()
    {
        $sql = "SELECT * FROM alliment";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteAlliment($id)
    {
        $currentQuantity = $this->getAlimentQuantity($id);
        if ($currentQuantity > 0) {
            $sqlDecrement = "UPDATE alliment SET quantity = quantity - 1 WHERE id = ?";
            $stmtDecrement = $this->conn->prepare($sqlDecrement);
            $stmtDecrement->bindParam(1, $id, PDO::PARAM_INT);
            $stmtDecrement->execute();
        }
    }
     function updateDate($id){
        //cette function permet de mettre à jour la date de fin quand on atteint la quantité 0
        $sql = "UPDATE alliment SET delete_at = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
     }
    private function getAlimentQuantity($id)
    {
        $sql = "SELECT quantity FROM alliment WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return ($result !== false) ? intval($result['quantity']) : 0;
    }
    
    
    
    public function addOneAlliment($id)
    {
        $stmt = $this->conn->prepare("UPDATE alliment SET quantity = quantity + 1 WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}