<x-header title="Produto">
    <link rel="stylesheet" href="ass">

@foreach($produtos as $produto)

<section class="Card">
    <h1 class="nome">{{ $produto->PRODUTO_NOME }}</h1>
    <p class="descricao">{{ $produto->PRODUTO_DESC }}</p>
    <p class="preco">{{ $produto->PRODUTO_PRECO }}</p>

<a href="/carrinho/{{$produto->PRODUTO_ID}}">Comprar</a>

</section>

@endforeach

</x-header>
