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
            $dados = [
                'usuario_id'      => (int)$_POST['usuario_id'],
                'procedimento_id' => (int)$_POST['procedimento_id'],
                'data_hora'       => $_POST['data_hora']
            ];

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