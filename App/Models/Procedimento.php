<?php

namespace App\Models;

use PDO;
use App\Database\Conexao;

class Procedimento
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }

    // Lista todos os procedimentos cadastrados
    public function listarTodos()
    {
        $sql = "SELECT * FROM procedimentos ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insere um novo procedimento
    public function cadastrar($dados)
    {
        $sql = "INSERT INTO procedimentos (nome_procedimento, descricao, preco, duracao_minutos, imagem) 
                VALUES (:nome, :descricao, :preco, :duracao, :imagem)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'      => $dados['nome_procedimento'],
            ':descricao' => $dados['descricao'],
            ':preco'     => $dados['preco'],
            ':duracao'   => $dados['duracao_minutos'],
            ':imagem'    => $dados['imagem'] ?? null
        ]);
    }

    // Exclui um procedimento por ID
    public function deletar($id)
    {
        $sql = "DELETE FROM procedimentos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}