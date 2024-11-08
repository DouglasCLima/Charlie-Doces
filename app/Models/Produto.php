<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected  $table = "PRODUTO";
    protected  $primaryKey = "PRODUTO_ID";
    public $timestamps = false;

}
