<?php

namespace App\Controllers;

use App\Models\Usuario;

class LoginController
{
    /**
     * Exibe a tela de login
     */
    public function index()
    {
        // Se já estiver logado, não precisa logar de novo, vai direto pro dashboard
        if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
            header('Location: index.php?param=dashboard');
            exit;
        }
        
        require_once 'App/Views/paginas/login.php';
    }

    /**
     * Processa o envio do formulário de login
     */
    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userInput = $_POST['usuario'] ?? '';
            $senhaInput = $_POST['senha'] ?? '';

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->autenticar($userInput, $senhaInput);

            if ($usuario && $usuario['nivel'] === 'admin') {
                // Configura as variáveis de sessão para manter o administrador conectado
                $_SESSION['admin_logado'] = true;
                $_SESSION['admin_id'] = $usuario['id'];
                $_SESSION['admin_nome'] = $usuario['nome'];

                // Redireciona para o Dashboard (Próxima tela que faremos)
                header('Location: index.php?param=dashboard');
                exit;
            } else {
                // Se falhar, manda de volta para a tela de login com o parâmetro de erro
                header('Location: index.php?param=login&erro=1');
                exit;
            }
        }
    }

    /**
     * Encerra a sessão e desloga do sistema
     */
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