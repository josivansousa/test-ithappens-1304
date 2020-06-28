<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $table = 'produtos';
    public $fillable = [
        'descricao',
        'codigo',
    ];

    public function filial(){
        return $this->hasOne("App\Models\Filial");
    }

    public function estoque(){
        return $this->hasOne("App\Models\Estoque");
    }
}
