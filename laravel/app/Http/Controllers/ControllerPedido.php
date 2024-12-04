<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\Endereco;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ControllerPedido extends Controller
{

    public function pedidos()
{
    // Carregar os itens do carrinho para o usuário logado
    $itensCarrinho = Carrinho::with('produto')
        ->where('USUARIO_ID', Auth::user()->USUARIO_ID)
        ->get();

    // Carregar o usuário autenticado
    $user = Auth::user();

    // Buscar o endereço do usuário autenticado
    $endereco = Endereco::where('USUARIO_ID', $user->USUARIO_ID)->first();

    // Passar os dados para a view
    return view('revisa', compact('itensCarrinho', 'user', 'endereco'));
}


    public function criaPedido(Produto $produtos)
    {
        // Recupera o endereço associado ao usuário logado
        $itensCarrinho = Carrinho::with('produto')
            ->where('USUARIO_ID', Auth::user()->USUARIO_ID)
            ->get();

        $endereco = Endereco::where('USUARIO_ID', Auth::user()->USUARIO_ID)->first();

        // Verifica se o endereço foi encontrado
        if (!$endereco) {
            return back()->withErrors(['message' => 'Nenhum endereço encontrado para o usuário.']);
        }

        // Cria o pedido
        $pedido = Pedido::create([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'ENDERECO_ID' => $endereco->ENDERECO_ID,
            'STATUS_ID' => 1, // Define o status inicial do pedido
            'PEDIDO_DATA' => now() // Define a data atual
        ]);

        foreach ($itensCarrinho as $produto) {
            PedidoItem::create([
                'PRODUTO_ID' => $produto->PRODUTO_ID, // ID do produto
                'PEDIDO_ID' => $pedido->PEDIDO_ID, // ID do pedido recém-criado
                'ITEM_QTD' => $produto->ITEM_QTD, // Quantidade do produto
                'ITEM_PRECO' => $produto->produto->PRODUTO_PRECO // Preço do produto// Preço do produto
            ]);
        }

        // Limpa o carrinho após a criação do pedido
        Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)->delete();

        // Redireciona para a lista de pedidos
        return redirect()->route('meus.pedidos', compact('itensCarrinho', 'endereco', 'pedido'));
    }

    public function meusPedidos()
{
    $meusPedidos = Pedido::with(['itens.produto', 'endereco', 'status']) // Inclua 'status' no with
        ->where('USUARIO_ID', Auth::user()->USUARIO_ID)
        ->whereHas('itens')
        ->orderBy('PEDIDO_ID', 'desc')
        ->get();

    $itensCarrinho = Carrinho::with('produto')
        ->where('USUARIO_ID', Auth::user()->USUARIO_ID)
        ->get();

    return view('meus-pedidos', compact('meusPedidos', 'itensCarrinho'));
}
}
