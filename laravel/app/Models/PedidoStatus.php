<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ControllerProduto;

class PedidoStatus extends Model
{
    protected $table = "PEDIDO_STATUS";

    protected $fillable = ['STATUS_DESC']; // Corrigido para um array

    public $timestamps = false;

    public function pedidos()
    {
        return $this->belongsTo(Pedido::class, 'STATUS_ID');
    }
}

