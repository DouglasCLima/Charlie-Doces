document.querySelectorAll('.btn-aumentar').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Evita o redirecionamento da página

        const produtoId = this.dataset.produtoId;

        fetch(`/carrinho/aumenta-quantidade/${produtoId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ quantidade: 1 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Atualize a interface com a nova quantidade
                const quantidadeElemento = document.querySelector(`#quantidade-${produtoId}`);
                quantidadeElemento.textContent = parseInt(quantidadeElemento.textContent) + 1;
            }
        })
        .catch(error => console.error('Erro:', error));
    });
});







