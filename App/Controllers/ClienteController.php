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

    // Exibe a listagem de clientes e o formulário
    public function index()
    {
        $clientes = $this->model->listarTodos();
        require_once 'App/Views/admin/clientes.php';
    }

    // Processa o cadastro de um novo cliente
    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'    => $_POST['nome'] ?? '',
                'usuario' => $_POST['usuario'] ?? '',
                'email'   => $_POST['email'] ?? '',
                'senha'   => $_POST['senha'] ?? 'cliente123' // Senha padrão caso não queira digitar no cadastro rápido
            ];

            if (!empty($dados['nome']) && !empty($dados['usuario'])) {
                $this->model->cadastrar($dados);
            }

            header('Location: index.php?param=clientes');
            exit;
        }
    }

    // Processa a exclusão de um cliente
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