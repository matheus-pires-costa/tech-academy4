<?php

namespace App\Controllers;

use App\Models\Procedimento;

class ProcedimentoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Procedimento();
    }


    public function index()
    {
        $procedimentos = $this->model->listarTodos();
        require_once 'App/Views/admin/procedimentos.php';
    }


    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome_procedimento' => $_POST['nome_procedimento'] ?? '',
                'descricao'         => $_POST['descricao'] ?? '',
                'preco'             => str_replace(',', '.', $_POST['preco'] ?? '0'), 
                'duracao_minutos'   => (int)($_POST['duracao_minutos'] ?? 0),
                'imagem'            => $_POST['imagem'] ?? null 
            ];

            if (!empty($dados['nome_procedimento'])) {
                $this->model->cadastrar($dados);
            }

            header('Location: index.php?param=procedimentos');
            exit;
        }
    }


    public function excluir()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->deletar($id);
        }
        header('Location: index.php?param=procedimentos');
        exit;
    }
}