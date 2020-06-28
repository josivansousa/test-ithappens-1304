<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';
    public $fillable = [
        'nome',
        'email',
    ];

    public function pedidosEstoque(){
        return $this->hasMany("App\Models\PedidoEstoque");
    }
}
