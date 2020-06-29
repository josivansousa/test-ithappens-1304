<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoEstoque extends Model
{
    public $table = 'pedidos_estoque';
    public $fillable = [
        'user_id',
        'filial_id',
        'cliente_id',
        'forma_pagamento_id',
        'status_pedido_id',
        'observacao'
    ];

    public function filial(){
        return $this->hasOne("App\Models\Filial", 'id', 'filial_id');
    }

    public function cliente(){
        return $this->hasOne("App\Models\Cliente", 'id', 'cliente_id');
    }

    public function usuario(){
        return $this->hasOne("App\Models\Usuario", 'id', 'user_id');
    }

    public function status(){
        return $this->hasOne("App\Models\StatusPedido", 'id', 'status_pedido_id');
    }

    public function itensPedido(){
        return $this->hasMany("App\Models\ItemPedido");
    }

    public function formaPagamento(){
        return $this->hasOne("App\Models\FormaPagamento", 'id', 'forma_pagamento_id');
    }
}
