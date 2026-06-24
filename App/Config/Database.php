<?php

namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host = "sql210.infinityfree.com";
    private $db_name = "if0_41731577_clinica_estetica";
    private $username = "if0_41731577";
    private $password = "Matheus2099";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn->exec("set names utf8");
            
        } catch(PDOException $exception) {
            echo "Erro de conexão com o banco de dados. Por favor, contate o suporte.";
            // echo " Detalhe do erro: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>