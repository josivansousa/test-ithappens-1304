<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public $table = 'estoques';
    public $fillable = [
        'filial_id',
        'qtd_total',
        'valor_unitario',
        'produto_id',
    ];

    public function filial(){
        return $this->hasOne("App\Models\Filial");
    }
    
    public function produto(){
        return $this->hasOne("App\Models\Produto");
    }

}
