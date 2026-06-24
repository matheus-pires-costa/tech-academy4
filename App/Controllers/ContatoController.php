<?php
namespace App\Controllers;

use App\Models\Agendamento;

class ContatoController {
    
    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agendamento = new Agendamento();

            $dados = [
                'nome'     => $_POST['nome_completo'],
                'telefone' => $_POST['telefone'],
                'email'    => $_POST['email'],
                'servico'  => $_POST['servico_endereco'],
                'data'     => $_POST['melhor_data'],
                'horario'  => $_POST['melhor_horario'],
                'mensagem' => $_POST['mensagem'],
                'servico_id' => $_GET['servico_id'] ?? null,
            ];

            if ($agendamento->inserir($dados)) {

                header("Location: index.php?param=contato&sucesso=1");
            } else {
                echo "Erro ao realizar agendamento.";
            }
        }
    }
}