<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;


class ControllerProduto extends Controller
{
    public function produtos()
{
    // Selecionar categorias com produtos associados
    $categorias = Categoria::has('produtos')
    ->orderBy('CATEGORIA_NOME', 'ASC') // Ordem alfabética crescente
    ->get();


    // Carregar produtos com paginação
    $produtos = Produto::with('imagens', 'categorias', 'Estoque')
        ->orderByRaw("(SELECT MAX(PRODUTO_QTD) FROM PRODUTO_ESTOQUE WHERE PRODUTO_ESTOQUE.PRODUTO_ID = PRODUTO.PRODUTO_ID) > 0 DESC")
        ->get();

    return view('produtos', compact('produtos', 'categorias'));
}

    public function show(Produto $produto)
    {
        return view('show', ['produto' => $produto]);
    }

    public function addCarrinho(Produto $produto)
    {
        $item = Carrinho::where(
            ['USUARIO_ID' => Auth::user()->USUARIO_ID, 'PRODUTO_ID' => $produto->PRODUTO_ID]
        )->first();

        if ($item) {
            Carrinho::where(['USUARIO_ID' => Auth::user()->USUARIO_ID, 'PRODUTO_ID' => $produto->PRODUTO_ID])->update([
                'ITEM_QTD' => $item->ITEM_QTD + 1
            ]);
        } else {
            Carrinho::create([
                'USUARIO_ID' => Auth::user()->USUARIO_ID,
                'PRODUTO_ID' => $produto->PRODUTO_ID,
                'ITEM_QTD' => 1
            ]);
        }

        return back()->withInput();
    }

    public function excluiCarrinho(Produto $produto)
    {
        $item = Carrinho::where([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $produto->PRODUTO_ID
        ])->first();

        if ($item) {
            Carrinho::where(['USUARIO_ID' => Auth::user()->USUARIO_ID, 'PRODUTO_ID' => $produto->PRODUTO_ID])->delete();
        }

        return back()->withInput();
    }

    public function aumentaQuantidade(Request $request, Produto $produto)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1'
        ]);

        $item = Carrinho::where(
            ['USUARIO_ID' => Auth::user()->USUARIO_ID, 'PRODUTO_ID' => $produto->PRODUTO_ID]
        )->first();

        $item = Carrinho::where([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $produto->PRODUTO_ID
        ])->update([
                    'ITEM_QTD' => $item->ITEM_QTD + 1
                ]);
        return redirect()->route('carrinho')->with('message', 'Quantidade atualizada.');
    }

    public function diminuiQuantidade(Request $request, Produto $produto)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1'
        ]);

        $item = Carrinho::where(
            ['USUARIO_ID' => Auth::user()->USUARIO_ID, 'PRODUTO_ID' => $produto->PRODUTO_ID]
        )->first();

        $item = Carrinho::where([
            'USUARIO_ID' => Auth::user()->USUARIO_ID,
            'PRODUTO_ID' => $produto->PRODUTO_ID
        ])->update([
                    'ITEM_QTD' => $item->ITEM_QTD - 1
                ]);

        return redirect()->route('carrinho')->with('message', 'Quantidade atualizada.');
    }


    public function carrinho()
    {
        $quantidadeItensCarrinho = 0;
        $quantidadeItensCarrinho = Carrinho::where('USUARIO_ID', Auth::id())->sum('ITEM_QTD');
        $items = Carrinho::where(['USUARIO_ID' => Auth::user()->USUARIO_ID])->get();
        return view('carrinho', compact('items'));
    }

}

