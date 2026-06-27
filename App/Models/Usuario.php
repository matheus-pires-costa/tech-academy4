<?php

namespace App\Models;

use PDO;
use App\Database\Conexao;

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }


    public function autenticar($userInput, $senhaInput)
    {
        
        $sql = "SELECT id, nome, usuario, email, senha, nivel 
                FROM usuarios 
                WHERE (usuario = :user OR email = :user) 
                LIMIT 1";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user', $userInput);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
      
            if ($senhaInput === $usuario['senha']) {
                return $usuario;
            }
        }

        return false;
    }
}