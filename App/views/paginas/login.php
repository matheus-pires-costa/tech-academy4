<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CN Estética</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row login-card g-0" style="background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(106, 27, 154, 0.1); max-width: 900px; width: 100%; overflow: hidden;">
        
        <div class="col-md-6 d-none d-md-block login-bg">
            </div>
        
        <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
            <div class="text-center mb-4">
                <h3 class="brand-purple">CN Estética</h3>
                <p class="text-muted">Painel Administrativo</p>
            </div>

            <?php if (isset($_GET['erro'])): ?>
                <div class="alert alert-danger text-center py-2" role="alert" style="font-size: 0.9rem;">
                    Usuário ou senha incorretos.
                </div>
            <?php endif; ?>

            <form action="index.php?param=logar" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label text-muted">Usuário / E-mail</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required autocomplete="username">
                </div>
                <div class="mb-4">
                    <label for="senha" class="form-label text-muted">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-purple w-100 py-2 rounded-3">Entrar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>