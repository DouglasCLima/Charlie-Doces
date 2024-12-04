function submitForm(produtoId) {
        // Seleciona o formulário pelo ID
        const form = document.getElementById(`add-to-cart-form-${produtoId}`);

        // Cria uma instância de FormData para capturar os dados do formulário
        const formData = new FormData(form);

        // Envia o formulário usando fetch e o método POST
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}' // Token CSRF para segurança
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produto adicionado ao carrinho!');
                // Aqui você pode atualizar o contador de itens do carrinho na interface
            } else {
                alert('Erro ao adicionar produto ao carrinho.');
            }
        })
        .catch(error => console.error('Erro:', error));
    }

