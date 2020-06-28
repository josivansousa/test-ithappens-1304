<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'clientes';
    public $fillable = [
        'nome',
        'cpf',
    ];

    public function pedidosEstoque(){
        return $this->hasMany("App\Models\PedidoEstoque");
    }
}
