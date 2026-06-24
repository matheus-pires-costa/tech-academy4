<?php
namespace App\Controllers;

use App\Models\Servico;

class ServicoController {
    public function exibirLista() {

        $servicoModel = new \App\Models\Servico();
        $listaServicos = $servicoModel->listarTodos();

        require_once __DIR__ . "/../views/paginas/servicos.php";
    }
}