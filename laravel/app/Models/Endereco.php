<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'ENDERECO';
    public $timestamps = false;

    protected $primaryKey = 'ENDERECO_ID';

    protected $fillable = [
        'ENDERECO_ID',
        'ENDERECO_NOME',
        'ENDERECO_LOGRADOURO',
        'ENDERECO_NUMERO',
        'ENDERECO_COMPLEMENTO',
        'ENDERECO_CEP',
        'ENDERECO_CIDADE',
        'ENDERECO_ESTADO',
        'ENDERECO_APAGADO',
        'USUARIO_ID', // Adicionado

    ];

    public function usuario()
{
    return $this->belongsTo(User::class, 'USUARIO_ID');
}


    public function endereco(){
        return $this->belongsTo(Pedido::class, 'ENDERECO_ID');
    }

    public function pedidos()
{
    return $this->hasMany(Pedido::class, 'ENDERECO_ID');
}

}

