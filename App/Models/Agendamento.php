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

    // 1. LISTAGEM CORRIGIDA (Usando cliente_id e servico_id)
    public function listarTodos()
    {
        $sql = "SELECT a.id, u.nome AS cliente_nome, p.nome_procedimento, a.data_hora, a.status 
                FROM agendamentos a
                INNER JOIN usuarios u ON a.cliente_id = u.id
                INNER JOIN procedimentos p ON a.servico_id = p.id
                ORDER BY a.id DESC";
                
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. CADASTRO CORRIGIDO (Inserindo em cliente_id e servico_id)
    public function cadastrar($dados)
    {
        $sql = "INSERT INTO agendamentos (cliente_id, servico_id, data_hora, status) 
                VALUES (:cliente_id, :servico_id, :data_hora, 'Pendente')";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':cliente_id' => $dados['usuario_id'],      // Mapeia o ID que vem da tela para o banco
            ':servico_id' => $dados['procedimento_id'], // Mapeia o ID que vem da tela para o banco
            ':data_hora'  => $dados['data_hora']
        ]);
    }

    // 3. EXCLUSÃO
    public function deletar($id)
    {
        $sql = "DELETE FROM agendamentos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}