<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


spl_autoload_register(function ($classe) {

    $caminho = str_replace('\\', '/', $classe) . '.php';
    if (file_exists($caminho)) {
        require_once $caminho;
    }
});


$param = $_GET['param'] ?? 'login';


switch ($param) {
    

    case 'login':
        $controller = new App\Controllers\LoginController();
        $controller->index();
        break;

    case 'logar':
        $controller = new App\Controllers\LoginController();
        $controller->logar();
        break;

    case 'logout':
        $controller = new App\Controllers\LoginController();
        $controller->logout();
        break;


    case 'dashboard':
        verificarAcesso();
        $controller = new \App\Controllers\AdminController();
        $controller->index();
        break;


    case 'procedimentos':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->index();
        break;

    case 'procedimento-salvar':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->salvar(); 
        break;

    case 'procedimento-excluir':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->excluir(); 
        break;

  
    case 'clientes':
        verificarAcesso();
        $controller = new \App\Controllers\ClienteController();
        $controller->index();
        break;

    case 'cliente-salvar':
        verificarAcesso();
        $controller = new \App\Controllers\ClienteController();
        $controller->salvar();
        break;

    case 'cliente-excluir':
        verificarAcesso();
        $controller = new \App\Controllers\ClienteController();
        $controller->excluir();
        break;


    case 'agendamentos':
        verificarAcesso();
        $controller = new \App\Controllers\AgendamentoController();
        $controller->index();
        break;

    case 'agendamento-salvar':
        verificarAcesso();
        $controller = new \App\Controllers\AgendamentoController();
        $controller->salvar();
        break;

    case 'agendamento-excluir':
        verificarAcesso();
        $controller = new \App\Controllers\AgendamentoController();
        $controller->excluir();
        break;


    default:
        http_response_code(404);
        echo "<h1>Erro 404 - Página não encontrada no MVC!</h1>";
        break;
}


function verificarAcesso() {
    if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
        header('Location: index.php?param=login');
        exit;
    }
}