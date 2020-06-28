<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    public $table = 'filiais';
    public $fillable = [
        'nome',
        'cnpj',
    ];

    public function produtos(){
        return $this->hasMany("App\Models\Produto");
    }

    public function pedidosEstoque(){
        return $this->hasMany("App\Models\PedidoEstoque");
    }

    public function estoque(){
        return $this->hasMany("App\Models\Estoque");
    }
}
