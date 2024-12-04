<x-header title="Meus Pedidos">
    <link rel="stylesheet" href="{{asset('styles/meuspedidos.css')}}">


    <div class="sem-pedidos">
        @if($meusPedidos->isEmpty())
            <a class="btn-acoes" href="{{ route('produtos') }}">Fazer minha primeira compra</a>
            <div id="principal-sem-pedidos">
            <p>Você ainda não realizou nenhum pedido.</p>
            </div>
        @else
            </div>
            <div class="com-pedidos">
                <a class="btn-acoes" href="{{ route('produtos') }}">Fazer um novo pedido</a>
            </div>

            <div id="principal">
                <h1>Meus Pedidos</h1>
                @foreach($meusPedidos as $pedido)
                    <div class="numero-pedido">
                        <p>Pedido #{{ $pedido->PEDIDO_ID }}</p>
                        <div class="data-pedido">
                        <p>{{ date('d/m/Y', strtotime($pedido->PEDIDO_DATA)) }}</p>
                    </div>
                    </div>
                    <div class="itens">
                        <div class="data-endereco">
                            <p><strong>Status:</strong> {{$pedido->status->STATUS_DESC}}</p>
                    <div class="endereco-pedido">
                        <p><strong>Endereço de entrega:</strong>
                        {{ $pedido->endereco->ENDERECO_LOGRADOURO }},
                        {{ $pedido->endereco->ENDERECO_NUMERO }} -
                        {{ $pedido->endereco->ENDERECO_CIDADE }} -
                        {{ $pedido->endereco->ENDERECO_ESTADO ?? 'Endereço não disponível' }}</p>

                    </div>
                    </div>
                    @php
                        $totalPedido = 0;
                    @endphp
                    <h2>Itens comprados</h2>
                    @foreach($pedido->itens as $item)
                        @php
                            $precoReal = $item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO;
                            $subTotal = $item->ITEM_QTD * $precoReal;
                            $totalPedido += $subTotal;
                        @endphp
                        <div class="itens-pedido">

                            <ul>
                                <li>
                                    <p> {{ $item->ITEM_QTD . 'x ' . $item->produto->PRODUTO_NOME . ' - ' .
                                'R$' . number_format($subTotal, 2, ',', '.') }}
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="total-pedido">
                        <p><strong>Total do Pedido: </strong> R${{ number_format($totalPedido, 2, ',', '.') }}</p>
                    </div>
                    </div>

                @endforeach
        @endif
    </div>
</x-header>
