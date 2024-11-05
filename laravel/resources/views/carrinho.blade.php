<x-header title="Carrinho">
   @foreach($items as $item)
  <li>{{ $item->Produto->PRODUTO_NOME }} - ({{$item->ITEM_QTD}})</li>
@endforeach
</x-header>
