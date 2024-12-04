// Selecionar todas as imagens de seta
const setas = document.querySelectorAll('.seta');
const itens = document.querySelectorAll('.itens')

// Adicionar evento de clique a cada seta
setas.forEach((seta) => {
    seta.addEventListener('click', () => {
        itens.classList.remove('disable')
    });
});



