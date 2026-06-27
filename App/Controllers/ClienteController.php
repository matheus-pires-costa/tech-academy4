<?php

namespace App\Controllers;

use App\Models\Cliente;

class ClienteController
{
    private $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }


    public function index()
    {
        $clientes = $this->model->listarTodos();
        require_once 'App/Views/admin/clientes.php';
    }


    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'    => $_POST['nome'] ?? '',
                'usuario' => $_POST['usuario'] ?? '',
                'email'   => $_POST['email'] ?? '',
                'senha'   => $_POST['senha'] ?? 'cliente123' 
            ];

            if (!empty($dados['nome']) && !empty($dados['usuario'])) {
                $this->model->cadastrar($dados);
            }

            header('Location: index.php?param=clientes');
            exit;
        }
    }


    public function excluir()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->deletar($id);
        }
        header('Location: index.php?param=clientes');
        exit;
    }
}