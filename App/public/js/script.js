
window.addEventListener('scroll', function() {
    var footer = document.querySelector('footer');
    var botao = document.getElementById('btnWhatsapp');

    if (!footer || !botao) return;

    var footerRect = footer.getBoundingClientRect();
    var windowHeight = window.innerHeight;

    if (footerRect.top < windowHeight) {
        var diferenca = windowHeight - footerRect.top;
        botao.style.bottom = (20 + diferenca) + 'px';
    } else {
        botao.style.bottom = '20px';
    }
});