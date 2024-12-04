<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = "PRODUTO_IMAGEM";
    protected $fillable = ['IMAGEM_ORDEM', 'IMAGEM_URL', 'PRODUTO_ID']; // Corrigido
    public $timestamps = false;

    public function produto() // Corrigido para camelCase
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }
}

