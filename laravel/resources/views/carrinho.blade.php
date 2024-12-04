<x-header title="Carrinho">
    <link rel="stylesheet" href="{{ asset('styles/carrinho.css') }}">
    <?php $totalGeral = 0; ?>

    <div id="carrinho-container">
        <a href="{{ route('produtos') }}">Continuar Comprando</a>

        @if ($items->isEmpty())
            <p class="mensagem-vazio">Carrinho vazio</p>
        @else
            @foreach ($items as $item)
                <?php
                $precoReal = $item->Produto->PRODUTO_PRECO - $item->Produto->PRODUTO_DESCONTO;
                $subTotal = $item->ITEM_QTD * $precoReal;
                $totalGeral += $subTotal;
                        ?>
                <div id="carrinho">
                    <div id="itens-carrinho">
                        <div id="itens">
                            <div id="nome-descricao">
                                <h1>{{ ucwords($item->Produto->PRODUTO_NOME) }}</h1>
                                <p>{{ ucwords($item->Produto->PRODUTO_DESC) }}</p>
                                @if ($item->Produto->PRODUTO_DESCONTO > 0)
                                    <div class="preco-inteiro">
                                        <p class="preco-original">{{'R$' . $item->Produto->PRODUTO_PRECO }}</p>
                                    </div>
                                    <div class="preco-principal">
                                        <p class="preco-desconto">
                                            {{'R$' . number_format($item->Produto->precoReal(), 2, ',', '.')}}
                                        </p>
                                    </div>
                                @else
                                    <div class="preco-principal">
                                        <p class="preco-desconto">
                                            {{'R$' . number_format($item->Produto->precoReal(), 2, ',', '.')}}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <!-- Formulário para atualizar a quantidade -->
                            <div id="total-qtd">
                                <p>{{ "Total: R$" . number_format($subTotal, 2, ',', '.') }}</p>
                                <div class="qtd">
                                    <form action="{{ route('diminui.quantidade', $item->Produto) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="mais-menos" type="submit" name="quantidade"
                                            value="{{ $item->ITEM_QTD - 1 }}">-</button>
                                    </form>
                                    <form action="{{ route('aumenta.quantidade', $item->Produto) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input class="qtd-compra" type="text" name="quantidade" value="{{ $item->ITEM_QTD }}"
                                            min="1">
                                        <button class="mais-menos" type="submit" name="quantidade"
                                            value="{{ $item->ITEM_QTD + 1 }}">+</button>
                                    </form>
                                </div>

                                <!-- Formulário para excluir o item -->
                                <form action="{{ route('exclui.carrinho', $item->Produto) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn-excluir">
                                        <img class="btn-excluir" src="{{ asset('icons/fechar.png') }}" alt="Botão excluir">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="total">
                <h2>Total</h2>
                <p>{{ "R$ " . number_format($totalGeral, 2, ',', '.') }}</p>
            </div>

            <div class="finaliza-compra">
                <a href="{{route('revisa.pedido')}}">Finalizar compra</a>
            </div>
        @endif
    </div>
</x-header>
