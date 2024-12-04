<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = "PRODUTO_ESTOQUE";
    protected $primaryKey = 'PRODUTO_ID';
    protected $fillable = ['PRODUTO_QTD', 'PRODUTO_ID']; // Corrigido
    public $timestamps = false;

    public function produto() // Corrigido para camelCase
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }
}

