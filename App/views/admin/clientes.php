<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Clientes - CN Estética</title>
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
                <li class="nav-item"><a class="nav-link active p-3" href="index.php?param=clientes">👥 Clientes (CRUD 2)</a></li>
                <li class="nav-item"><a class="nav-link p-3" href="index.php?param=agendamentos">📅 Agendamentos (CRUD 3)</a></li>
            </ul>
            <hr class="mt-5">
            <a href="index.php?param=logout" class="btn btn-outline-light w-100 py-2">Sair / Logout</a>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">
            <h1 class="h2 mb-4 text-purple" style="font-weight: 700;">Gerenciar Clientes cadastrados</h1>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card card-indicador bg-white p-4">
                        <h5 class="fw-bold mb-3 text-purple">Novo Cliente</h5>
                        <form action="index.php?param=cliente-salvar" method="POST">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Nome de Usuário (Login)</label>
                                <input type="text" class="form-control" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">E-mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted">Senha de Acesso</label>
                                <input type="password" class="form-control" name="senha" placeholder="cliente123" required>
                            </div>
                            <button type="submit" class="btn btn-purple w-100 py-2">Cadastrar Cliente</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card card-indicador bg-white p-4">
                        <h5 class="fw-bold mb-3 text-purple">Clientes Ativos</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>E-mail</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($clientes)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">Nenhum cliente cadastrado ainda.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($clientes as $cli): ?>
                                            <tr>
                                                <td>#<?= $cli['id']; ?></td>
                                                <td><strong><?= htmlspecialchars($cli['nome']); ?></strong></td>
                                                <td><?= htmlspecialchars($cli['usuario']); ?></td>
                                                <td><?= htmlspecialchars($cli['email']); ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?param=cliente-excluir&id=<?= $cli['id']; ?>" 
                                                       class="btn btn-sm btn-outline-danger"
                                                       onclick="return confirm('Deseja realmente remover este cliente do sistema?')">
                                                       Excluir
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