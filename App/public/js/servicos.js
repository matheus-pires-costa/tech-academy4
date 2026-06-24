
document.addEventListener("DOMContentLoaded", function () {

    const servicos = [
        {
            imagem: "imagens/servico1.png",
            titulo: "Dermaplaning Divino(Com Hidratação)",
            descricao: "Esfoliação que remove os pelinho do rosto e células mortas, potencializando o brilho e a absorção dos produtos."
        },
        {
            imagem: "imagens/servico2.png",
            titulo: "Maassagem relaxante (Comum)",
            descricao: "Técnica que utiliza movimentos suaves e contínuos para aliviar tensões, promover o relaxamento profundo e restaurar o bem-estar."
        },
        {
            imagem: "imagens/servico3.png",
            titulo: "Massagem Relaxante (Com Ventosas)",
            descricao: "Técnica que une o relaxamento profundo a ventosas terapêuticas, aliviando dores musculares e promovendo descompressão imediata."
        },
        {
            imagem: "imagens/servico4.png",
            titulo: "Limpeza de Pele Profunda",
            descricao: "Remoção de cravos, miliuns e impurezas, finalizando com hidratação e proteção."
        },

        {
            imagem: "imagens/servico5.png",
            titulo: "Microagulhamento (Dermapen)",
            descricao: "Estimula a produção de colágeno e a renovação celular para tratar cicatrizes de acne e linhas finas."
        }
    ];

    const container = document.getElementById("lista-servicos");

    if (container) {

        servicos.forEach(function (servico) {

            const cardHTML = `
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
                        
                        <img src="${servico.imagem}" class="card-img-top" alt="${servico.titulo}" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title" style="color: #3e1253;">${servico.titulo}</h5>
                            <p class="card-text flex-grow-1">${servico.descricao}</p>
                            
                            <a href="https://bit.ly/4biyKWU" class="btn btn-success mt-auto" target="_blank">
                                Quero Agendar <i class="bi bi-whatsapp ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;

            container.innerHTML += cardHTML;
        });
    }

});