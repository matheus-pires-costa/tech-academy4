<?php

namespace App\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Procedimento;

class AgendamentoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Agendamento();
    }

    public function index()
    {
        $agendamentos = $this->model->listarTodos();
        

        $clienteModel = new Cliente();
        $procedimentoModel = new Procedimento();
        
        $clientes = $clienteModel->listarTodos();
        $procedimentos = $procedimentoModel->listarTodos();

        require_once 'App/Views/admin/agendamentos.php';
    }

   public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = \App\Database\Conexao::getConnection();
            
            $dados = [
                'usuario_id'      => (int)$_POST['usuario_id'],
                'procedimento_id' => (int)$_POST['procedimento_id'],
                'data_hora'       => $_POST['data_hora']
            ];

            $stmt = $db->prepare("SELECT fn_verificar_disponibilidade_agenda(:data_hora) AS disponivel");
            $stmt->bindValue(':data_hora', $dados['data_hora']);
            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($resultado['disponivel'] == 0) {
                header('Location: index.php?param=agendamentos&erro_agenda=1');
                exit;
            }

            if ($dados['usuario_id'] > 0 && $dados['procedimento_id'] > 0) {
                $this->model->cadastrar($dados);
            }

            header('Location: index.php?param=agendamentos');
            exit;
        }
    }

    public function excluir()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->deletar($id);
        }
        header('Location: index.php?param=agendamentos');
    }
}