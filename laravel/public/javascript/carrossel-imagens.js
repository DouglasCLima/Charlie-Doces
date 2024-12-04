function trocarImagem(elemento) {
        // Seleciona a imagem principal e altera sua fonte
        const imagemPrincipal = document.getElementById('imagem-principal');
        imagemPrincipal.src = elemento.src; // Copia o src da imagem clicada para a principal
        imagemPrincipal.alt = elemento.alt; // Opcional: altera também o atributo alt
    }
