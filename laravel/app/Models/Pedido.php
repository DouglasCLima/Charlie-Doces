<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    use HasFactory;
    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID'; // Corrigido para `primaryKey`

    public $timestamps = false; // Desativando timestamps automáticos

    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO_ID',
        'STATUS_ID',
        'PEDIDO_DATA'
    ];

    // Relacionamento com Endereço

public function itens()
{
    return $this->hasMany(PedidoItem::class, 'PEDIDO_ID');
}

public function endereco()
{
    return $this->belongsTo(Endereco::class, 'ENDERECO_ID');
}


    public function user(){
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }

    // Relacionamento com Status
    public function status()
{
    return $this->belongsTo(PedidoStatus::class, 'STATUS_ID', 'STATUS_ID');
}
}

