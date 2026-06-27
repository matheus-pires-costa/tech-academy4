<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - CN Estética</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tech-academy4/App/public/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center my-4">
                <h4>CN Estética</h4>
                <small class="text-white-50">Olá, <?= htmlspecialchars($_SESSION['admin_nome']); ?></small>
            </div>
            <hr>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link active p-3" href="index.php?param=dashboard">📊 Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" href="index.php?param=procedimentos">✨ Procedimentos (CRUD 1)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" href="index.php?param=clientes">👥 Clientes (CRUD 2)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" href="index.php?param=agendamentos">📅 Agendamentos (CRUD 3)</a>
                </li>
            </ul>
            <hr class="mt-5">
            <a href="index.php?param=logout" class="btn btn-outline-light w-100 py-2">Sair / Logout</a>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-purple" style="color: #4a148c; font-weight: 700;">Indicadores do Sistema</h1>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card card-indicador bg-purple-light p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1 fw-bold">Procedimentos</h6>
                                <h2 class="display-5 fw-bold mb-0"><?= $totalProcedimentos; ?></h2>
                            </div>
                            <span style="font-size: 2.5rem;">✨</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-indicador bg-purple-medium p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1 fw-bold">Clientes Cadastrados</h6>
                                <h2 class="display-5 fw-bold mb-0"><?= $totalClientes; ?></h2>
                            </div>
                            <span style="font-size: 2.5rem;">👥</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-indicador bg-purple-dark p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1 fw-bold">Total Agendamentos</h6>
                                <h2 class="display-5 fw-bold mb-0"><?= $totalAgendamentos; ?></h2>
                            </div>
                            <span style="font-size: 2.5rem;">📅</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-indicador bg-white p-4">
                <h5 class="fw-bold mb-3" style="color: #4a148c;">Visão Geral do Administrador</h5>
                <p class="text-muted mb-0">Utilize o menu lateral para gerenciar os cadastros do sistema. Cada alteração realizada nos valores dos procedimentos alimentará as tabelas de auditoria configuradas de forma avançada no banco de dados.</p>
            </div>
        </main>
    </div>
</div>

</body>
</html>