<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected  $table = "PRODUTO";
    protected  $primaryKey = "PRODUTO_ID";
    public $timestamps = false;

    public function imagens()
    {
        return $this->hasMany(Imagem::class, 'PRODUTO_ID');
    }

     public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'CATEGORIA_ID', 'CATEGORIA_ID');
    }

      public function estoque()
    {
        return $this->hasOne(Estoque::class, 'PRODUTO_ID');
    }

    public function emEstoque()
    {
        return $this->estoque && $this->estoque->PRODUTO_QTD > 0;
    }

    public function precoReal(){
        return $this->PRODUTO_PRECO - $this->PRODUTO_DESCONTO;
    }

    public function pedidoItems()
{
    return $this->hasMany(PedidoItem::class, 'PRODUTO_ID');
}




}
