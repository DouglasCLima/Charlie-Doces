<x-header title="{{$produto->PRODUTO_NOME}}">
    <link rel="stylesheet" href="{{asset('styles/show-produtos.css')}}">
    <script src="{{asset('javascript/carrossel-imagens.js')}}"></script>

        <div class="voltar">
            <a href="{{route('produtos')}}">Comprar mais</a>
        </div>
    <div id="principal">
        <section class="Card">
            <div class="imagem">
                <div id="campo-imagem-principal">
                    <img id="imagem-principal"
                        src="{{ asset($produto->imagens->first()->IMAGEM_URL ?? 'default_image_path.jpg') }}"
                        alt="Imagem principal do {{ $produto->PRODUTO_NOME }}">
                </div>

                <div class="campo-imagens">
                    @foreach($produto->imagens as $imagem)
                        <img id="imagens" src="{{ asset($imagem->IMAGEM_URL) }}"
                            alt="Imagem do {{ $produto->PRODUTO_NOME }}" onclick="trocarImagem(this)">
                    @endforeach
                </div>
            </div>

            <div class="textos">
                <div class="texto-principal">

                    <h1 class="nome">{{ ucwords($produto->PRODUTO_NOME) }}</h1>
                    <p class="descricao">{{ ucfirst($descricao = $produto->PRODUTO_DESC) }}</p>
                </div>

                <div class="precos-comprar">

                    @if ($produto->PRODUTO_DESCONTO > 0)
                        <div class="preco-inteiro">
                            <p class="preco-original">{{'R$' . $produto->PRODUTO_PRECO }}</p>
                        </div>
                        <div class="preco-principal">
                            <p class="preco-desconto">
                                {{'R$' . number_format($produto->precoReal(), 2)}}
                            </p>
                        </div>
                    @else
                        <div class="preco-principal">
                            <p class="preco-desconto">
                                {{'R$' . number_format($produto->precoReal(), 2)}}
                            </p>
                        </div>
                    @endif
                    <div class="comprar">
                        <a href="/carrinho/{{$produto->PRODUTO_ID}}">Adicionar ao carrinho</a>
                    </div>
                </div>
            </div>

        </section>
    </div>

</x-header>
