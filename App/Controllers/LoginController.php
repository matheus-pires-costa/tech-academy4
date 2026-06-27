<?php

namespace App\Controllers;

class LoginController
{
    public function index()
    {
        // Carrega a tela visual de login
        require_once 'App/Views/paginas/login.php';
    }

    public function logar()
    {
        // Lógica que processará o formulário (faremos logo em seguida)
        echo "Processando o login...";
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