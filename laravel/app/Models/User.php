<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'USUARIO';
    public $timestamps = false;
    protected $primaryKey = 'USUARIO_ID';

    protected $fillable = [
        'USUARIO_ID',
        'USUARIO_NOME',
        'USUARIO_EMAIL',
        'USUARIO_SENHA',
        'USUARIO_CPF'
    ];
    public function endereco()
{
    return $this->hasOne(Endereco::class, 'USUARIO_ID');
}
}
