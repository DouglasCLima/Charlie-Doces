<x-header title="Revisão de pedido">
    <link rel="stylesheet" href="{{asset('styles/revisa.css')}}">
    <?php $totalGeral = 0;
    $nome_completo = $authUser->USUARIO_NOME;
    $usuario = strtok($nome_completo, " ");
    ?>


    <div id="btn-acoes">
            <a href="{{route('carrinho')}}">Editar carrinho</a>
        </div>
    <div id="principal">
        <h2>{{$usuario}}, revise o seu pedido antes de finalizar sua compra.</h2>
        <div class="dados-pessoais">
        <p class="nome"><strong>Nome para entrega: </strong>{{$nome_completo}}</p>
        <p class="endereco"><strong>Endereço de entrega:</strong>
         {{ $endereco->ENDERECO_LOGRADOURO }},
                        {{ $endereco->ENDERECO_NUMERO }}
                        {{' - '. $endereco->ENDERECO_COMPLEMENTO.' - '?? ' - '}}
                        {{ $endereco->ENDERECO_CIDADE }} -
                        {{ $endereco->ENDERECO_ESTADO ?? 'Endereço não disponível' }}</p>
            <div class="editar-dados">
            <a class="btn-editar-dados" href="{{route('edit.form')}}">Editar Endereço</a>
            </div>

        </div>

        <div class="conteudo-pedido">
            @foreach ($itensCarrinho as $item)
                        <?php
                $precoReal = $item->Produto->PRODUTO_PRECO - $item->Produto->PRODUTO_DESCONTO;
                $subTotal = $item->ITEM_QTD * $precoReal;
                $totalGeral += $subTotal;
                    ?>
                        <p><strong>{{ $item->ITEM_QTD.'x ' }}</strong>{{ucwords($item->produto->PRODUTO_NOME.'  ')}}<strong>{{'R$'.number_format( $subTotal,2,',') }}</strong></p><hr>
            @endforeach
        </div>
        <div class="total-compra">
            <p>Total: {{' R$'. number_format($totalGeral,2,',')}}</p><hr>
        </div>
        <div class="finalizar-pedido">
            <form action="{{ route('pedido.finalizar') }}" method="POST">
                @csrf
                <button type="submit">Finalizar Pedido</button>
            </form>
        </div>
    </div>
</x-header>
<x-footer></x-footer>
