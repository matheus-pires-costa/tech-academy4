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

    /**
     * Verifica se o usuário e senha existem no banco de dados.
     * Retorna os dados do usuário se for bem-sucedido, ou false se falhar.
     */
    public function autenticar($userInput, $senhaInput)
    {
        // Graças ao ÍNDICE que criamos no SQL, essa busca em 'usuario' ou 'email' é ultra rápida
        $sql = "SELECT id, nome, usuario, email, senha, nivel 
                FROM usuarios 
                WHERE (usuario = :user OR email = :user) 
                LIMIT 1";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user', $userInput);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificação direta em texto limpo (para fins acadêmicos/simplicidade)
            if ($senhaInput === $usuario['senha']) {
                return $usuario;
            }
        }

        return false;
    }
}