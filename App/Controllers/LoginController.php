<?php

namespace App\Controllers;

use App\Models\Usuario;

class LoginController
{

    public function index()
    {

        if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
            header('Location: index.php?param=dashboard');
            exit;
        }
        
        require_once 'App/Views/paginas/login.php';
    }


    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userInput = $_POST['usuario'] ?? '';
            $senhaInput = $_POST['senha'] ?? '';

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->autenticar($userInput, $senhaInput);

            if ($usuario && $usuario['nivel'] === 'admin') {

                $_SESSION['admin_logado'] = true;
                $_SESSION['admin_id'] = $usuario['id'];
                $_SESSION['admin_nome'] = $usuario['nome'];

   
                header('Location: index.php?param=dashboard');
                exit;
            } else {
      
                header('Location: index.php?param=login&erro=1');
                exit;
            }
        }
    }


    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: index.php?param=login');
        exit;
    }
}