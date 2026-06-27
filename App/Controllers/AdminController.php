<?php

namespace App\Controllers;

use App\Database\Conexao;
use PDO;

class AdminController
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getConnection();
    }

    public function index()
    {
        // Consultas simples para alimentar o Dashboard de Indicadores (Requisito de 4 pontos)
        
        // 1. Total de Procedimentos Cadastrados (CRUD 1)
        $stmt = $this->db->query("SELECT COUNT(*) FROM procedimentos");
        $totalProcedimentos = $stmt->fetchColumn();

        // 2. Total de Clientes Cadastrados (CRUD 2)
        $stmt = $this->db->query("SELECT COUNT(*) FROM usuarios WHERE nivel = 'cliente'");
        $totalClientes = $stmt->fetchColumn();

        // 3. Total de Agendamentos/Pedidos Realizados (CRUD 3)
        $stmt = $this->db->query("SELECT COUNT(*) FROM agendamentos");
        $totalAgendamentos = $stmt->fetchColumn();

        // Carrega a View do painel passando as variáveis
        require_once 'App/Views/admin/dashboard.php';
    }
}