<?php

// 1. Ativa a sessão para controle de acesso/login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Autoload Simples para carregar as classes das pastas automaticamente
spl_autoload_register(function ($classe) {
    // Converte os Namespaces (ex: App\Controllers\LoginController) no caminho real do arquivo
    $caminho = str_replace('\\', '/', $classe) . '.php';
    if (file_exists($caminho)) {
        require_once $caminho;
    }
});

// 3. Captura a rota informada na URL (Ex: index.php?param=dashboard)
// Se não passar nada, a página inicial padrão será o 'login'
$param = $_GET['param'] ?? 'login';

// 4. Roteador (Switch) - Orquestra qual Controller e Método chamar
switch ($param) {
    
    // --- ROTAS DE AUTENTICAÇÃO ---
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

    // --- ROTAS DO PAINEL ADMINISTRATIVO (ÁREA PROTEGIDA) ---
    // Procure pelo case 'dashboard' e substitua por este:
    case 'dashboard':
        verificarAcesso();
        $controller = new \App\Controllers\AdminController();
        $controller->index();
        break;

    // --- ROTAS DO CRUD 1: PROCEDIMENTOS ESTÉTICOS ---
    case 'procedimentos':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->index(); // Lista os procedimentos
        break;

    case 'procedimento-salvar':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->salvar(); // Cria ou edita
        break;

    case 'procedimento-excluir':
        verificarAcesso();
        $controller = new App\Controllers\ProcedimentoController();
        $controller->excluir(); // Deleta
        break;

    // --- ROTAS DO CRUD 2: CLIENTES ---
    // Adicione ou certifique-se de que estes blocos estão ativos no seu switch do index.php:
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

    // --- ROTAS DO CRUD 3: AGENDAMENTOS (CARRINHO/PEDIDOS) ---
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

    // --- ROTA PADRÃO SE O PARAM NÃO EXISTIR ---
    default:
        http_response_code(404);
        echo "<h1>Erro 404 - Página não encontrada no MVC!</h1>";
        break;
}

/**
 * Função Auxiliar de Segurança (Controle de Acesso)
 * Verifica se o usuário está logado antes de liberar as rotas administrativas
 */
function verificarAcesso() {
    if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
        // Se não estiver logado, barra e joga de volta para o login
        header('Location: index.php?param=login');
        exit;
    }
}