<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Servico {
    private $conn;
    private $table_name = "servicos";


    private $id;
    private $nome_servico;
    private $preco;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function listarTodos() {
        $query = "SELECT id, nome_servico, descricao, preco, imagem FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}