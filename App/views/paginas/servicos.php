<div class="container my-5">
    <h2 class="text-center mb-5" style="color: #4a148c; font-weight: 700;">Nossos Serviços</h2>
    
    <div class="row g-4">
        <?php 
        if (isset($listaServicos) && !empty($listaServicos)): 

            foreach ($listaServicos as $s ): 
                
                $imagem = !empty($s['imagem']) ? '/' . $s['imagem'] : '/../App/public/imagens/servicos-geral.png';
        ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 shadow-sm custom-card">
                    <img src=<?= $s['imagem'] ?> class="card-img-top" alt="<?= $s['nome_servico']; ?>" 
                         style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold"><?= $s['nome_servico']; ?></h5>
                        <p class="card-text text-muted flex-grow-1"><?= $s['descricao']; ?></p>
                        
                        <div class="mt-3">
                            <span class="badge bg-soft-purple text-dark fs-6 mb-3">
                                R$ <?= number_format($s['preco'], 2, ',', '.'); ?>
                            </span>
                            <a href="index.php?param=contato&servico_id=<?= $s['id'] ?>" class="btn btn-primary">Agendar Agora</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            endforeach; 
        
        else: 
        ?>
            <div class="col-12 text-center py-5">
                <div class="alert alert-warning shadow-sm" role="alert">
                    <h4 class="alert-heading">⚠️ Ops! Problema na conexão.</h4>
                    <p>Não foi possível carregar os serviços no momento. Verifique sua conexão com o banco de dados ou tente novamente mais tarde.</p>
                    <hr>
                    <p class="mb-0">Se o erro persistir, entre em contato com o suporte técnico da CN Estética.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>