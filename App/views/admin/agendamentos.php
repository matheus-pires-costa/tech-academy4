<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Agendamentos - CN Estética</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tech-academy4/App/public/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center my-4">
                <h4>CN Estética</h4>
                <small class="text-white-50">Painel ADM</small>
            </div>
            <hr>
            <ul class="nav flex-column gap-2">
                <li class="nav-item"><a class="nav-link p-3" href="index.php?param=dashboard">📊 Dashboard</a></li>
                <li class="nav-item"><a class="nav-link p-3" href="index.php?param=procedimentos">✨ Procedimentos (CRUD 1)</a></li>
                <li class="nav-item"><a class="nav-link p-3" href="index.php?param=clientes">👥 Clientes (CRUD 2)</a></li>
                <li class="nav-item"><a class="nav-link active p-3" href="index.php?param=agendamentos">📅 Agendamentos (CRUD 3)</a></li>
            </ul>
            <hr class="mt-5">
            <a href="index.php?param=logout" class="btn btn-outline-light w-100 py-2">Sair / Logout</a>
        </nav>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">
            <h1 class="h2 mb-4 text-purple" style="font-weight: 700;">Gerenciar Carrinho de Agendamentos</h1>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="card card-indicador bg-white p-4">
                        <h5 class="fw-bold mb-3 text-purple">Novo Agendamento</h5>
                        <form action="index.php?param=agendamento-salvar" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Selecione o Cliente</label>
                                <select class="form-select" name="usuario_id" required>
                                    <option value="">-- Escolha o Cliente --</option>
                                    <?php foreach ($clientes as $cli): ?>
                                        <option value="<?= $cli['id']; ?>"><?= htmlspecialchars($cli['nome']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">Procedimento Desejado</label>
                                <select class="form-select" name="procedimento_id" required>
                                    <option value="">-- Escolha o Procedimento --</option>
                                    <?php foreach ($procedimentos as $proc): ?>
                                        <option value="<?= $proc['id']; ?>"><?= htmlspecialchars($proc['nome_procedimento']); ?> - R$ <?= number_format($proc['preco'], 2, ',', '.'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted">Data e Horário / Turno</label>
                                <input type="text" class="form-control" name="data_hora" placeholder="Ex: Segunda-feira - Manhã" required>
                            </div>

                            <button type="submit" class="btn btn-purple w-100 py-2">Confirmar Agendamento</button>
                        </form>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="card card-indicador bg-white p-4">
                        <h5 class="fw-bold mb-3 text-purple">Sessões Marcadas</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Procedimento</th>
                                        <th>Período</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($agendamentos)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">Nenhum agendamento realizado.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($agendamentos as $agen): ?>
                                            <tr>
                                                <td>#<?= $agen['id']; ?></td>
                                                <td><strong><?= htmlspecialchars($agen['cliente_nome']); ?></strong></td>
                                                <td><span class="badge bg-purple-light p-2 text-dark"><?= htmlspecialchars($agen['nome_procedimento']); ?></span></td>
                                                <td><?= htmlspecialchars($agen['data_hora']); ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?param=agendamento-excluir&id=<?= $agen['id']; ?>" 
                                                       class="btn btn-sm btn-outline-danger"
                                                       onclick="return confirm('Cancelar este agendamento?')">
                                                       Remover
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>