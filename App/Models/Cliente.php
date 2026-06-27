<?php

namespace App\Models;

use PDO;
use App\Database\Conexao;

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }

    // Lista apenas os registros que são clientes
    public function listarTodos()
    {
        $sql = "SELECT id, nome, usuario, email, created_at FROM usuarios WHERE nivel = 'cliente' ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insere um novo cliente no banco
    public function cadastrar($dados)
    {
        $sql = "INSERT INTO usuarios (nome, usuario, email, senha, nivel) 
                VALUES (:nome, :usuario, :email, :senha, 'cliente')";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'    => $dados['nome'],
            ':usuario' => $dados['usuario'],
            ':email'   => $dados['email'],
            ':senha'   => $dados['senha'] // Em texto limpo para manter o padrão simples acordado
        ]);
    }

    // Exclui um cliente por ID
    public function deletar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id AND nivel = 'cliente'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}