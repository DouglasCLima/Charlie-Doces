<x-header title="Produtos">
    <link rel="stylesheet" href="{{ asset('styles/produtos.css') }}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on('click', '.categoria', function () {
            let categoriaId = $(this).data('id');

            $(".Card").each(function () {
                $(this).toggle($(this).data('categoria') == categoriaId || categoriaId == 'all');
            });
        });
    </script>

    <div id="categorias">
        <a class="categoria" data-id="all">Todas as Categorias</a>
        @foreach ($categorias as $categoria)
            <a class="categoria" data-id="{{ $categoria->CATEGORIA_ID }}">{{ $categoria->CATEGORIA_NOME }}</a>
        @endforeach
    </div>

    <div id="principal">
        @foreach($produtos as $produto)
            <section class="Card" data-categoria="{{ $produto->CATEGORIA_ID }}">
                <div class="texto-principal">
                    <h1 class="nome">{{ ucwords($produto->PRODUTO_NOME) }}</h1>
                </div>
                @if ($produto->PRODUTO_DESCONTO > 0)
                    <div class="preco-inteiro">
                        <p class="preco-original">{{ 'R$' . number_format($produto->PRODUTO_PRECO, 2, ',', '.' )}}</p>
                    </div>
                    <div class="preco-principal">
                        <p class="preco-desconto">
                            {{ 'R$' . number_format($produto->precoReal(), 2, ',', '.') }}
                        </p>
                    </div>
                @else
                    <div class="preco-principal">
                        <p class="preco-desconto">
                            {{ 'R$' . number_format($produto->precoReal(), 2, ',', '.') }}
                        </p>
                    </div>
                @endif
                <div id="campo-imagem-principal">
                    <img id="imagem-principal"
                         src="{{ asset($produto->imagens->first()->IMAGEM_URL ?? 'default_image_path.jpg') }}"
                         alt="Imagem principal do {{ $produto->PRODUTO_NOME }}">
                </div>

                @if ($produto->emEstoque())
                    <div class="comprar">
                        <div class="ver-mais">
                            <a href="./produtos/{{ $produto->PRODUTO_ID }}">Ver mais</a>
                        </div>
                        <div class="adicionar-carrinho">
                            <a href="./carrinho/{{ $produto->PRODUTO_ID }}">
                                <img src="{{ asset('icons/simbolo-de-movimento-do-carrinho-de-compras.png') }}">
                            </a>
                        </div>
                    </div>
                @else
                    <div class="comprar sem-estoque">
                        <a>Sem estoque</a>
                    </div>
                @endif
            </section>
        @endforeach
    </div>
</x-header>

<x-footer></x-footer>
