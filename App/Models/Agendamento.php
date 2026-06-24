<?php

namespace App\Models;

use PDO;
use App\Database\Conexao; // Certifique-se de que sua classe de conexão está aqui

class Agendamento
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }

    public function inserir($dados)
    {

        $dataHoraCompleta = $dados['data'] . ' ' . $dados['horario'];

        $sql = "INSERT INTO agendamentos 
            (nome_completo, telefone, email, data_hora, mensagem, servico_id) 
            VALUES (:nome, :tel, :email, :data_hora, :msg, :servico_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome'        => $dados['nome'],
            ':tel'         => $dados['telefone'],
            ':email'       => $dados['email'],
            ':data_hora'   => $dataHoraCompleta,
            ':msg'         => "Período selecionado: " . $dados['horario'] . " - " . $dados['mensagem'],
            ':servico_id'  => $dados['servico_id']
        ]);
    }
}
