<?php

namespace App\Models;

use PDO;
use App\Database\Conexao;

class Agendamento
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }

    // Traz a listagem unindo os dados das 3 tabelas (Essencial para TADS)
    public function listarTodos()
    {
        $sql = "SELECT a.id, u.nome AS cliente_nome, p.nome_procedimento, a.data_hora, a.status 
                FROM agendamentos a
                INNER JOIN usuarios u ON a.usuario_id = u.id
                INNER JOIN procedimentos p ON a.procedimento_id = p.id
                ORDER BY a.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Salva o agendamento no banco
    public function cadastrar($dados)
    {
        $sql = "INSERT INTO agendamentos (usuario_id, procedimento_id, data_hora, status) 
                VALUES (:usuario_id, :procedimento_id, :data_hora, 'Pendente')";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':usuario_id'      => $dados['usuario_id'],
            ':procedimento_id' => $dados['procedimento_id'],
            ':data_hora'       => $dados['data_hora']
        ]);
    }

    // Remove um agendamento
    public function deletar($id)
    {
        $sql = "DELETE FROM agendamentos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}