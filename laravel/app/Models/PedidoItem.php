<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ControllerProduto;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PedidoItem extends Model
{
    protected $table = 'PEDIDO_ITEM';

    public $primaryKey = 'PEDIDO_ID'; // Confirme se o campo chave primária está correto

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PEDIDO_ID',
        'ITEM_QTD',
        'ITEM_PRECO'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID');
    }

    public function produto()
{
    return $this->belongsTo(Produto::class, 'PRODUTO_ID');
}



    public function item()
    {
        return $this->belongsTo(Carrinho::class, 'ITEM_QTD'); // Verifique se este relacionamento está correto
    }

    public function preco()
    {
        // Se você realmente precisa associar o preço do produto, revise o relacionamento aqui
        return $this->belongsTo(Produto::class, 'PRODUTO_PRECO', 'ITEM_PRECO'); // Ajustado para associar diretamente ao Produto
    }
}

