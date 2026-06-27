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

        

        $stmt = $this->db->query("SELECT COUNT(*) FROM procedimentos");
        $totalProcedimentos = $stmt->fetchColumn();


        $stmt = $this->db->query("SELECT COUNT(*) FROM usuarios WHERE nivel = 'cliente'");
        $totalClientes = $stmt->fetchColumn();


        $stmt = $this->db->query("SELECT COUNT(*) FROM agendamentos");
        $totalAgendamentos = $stmt->fetchColumn();


        require_once 'App/Views/admin/dashboard.php';
    }
}