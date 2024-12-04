<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "CATEGORIA";
    protected $primaryKey = 'CATEGORIA_ID';
    protected $fillable = ['CATEGORIA_NOME', 'CATEGORIA_DESC', 'CATEGORIA_ATIVO']; // Ajustado
    public $timestamps = false;

public function produtos() // Corrigido para camelCase
    {
        return $this->hasOne(Produto::class, 'CATEGORIA_ID');
    }

    }
