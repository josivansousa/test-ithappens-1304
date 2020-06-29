<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    public $table = 'itens_pedido';
    public $fillable = [
        'pedido_estoque_id',
        'qtd',
        'valor_unitario',
        'produto_id',
        'status_item_id',
    ];

    public function pedidosEstoque(){
        return $this->hasOne("App\Models\PedidoEstoque", 'id', 'pedido_estoque_id');
    }

    public function produtos(){
        return $this->hasOne("App\Models\Produto", 'id', 'produto_id');
    }

    public function status(){
        return $this->hasOne("App\Models\StatusItem", 'id', 'status_item_id');
    }
}
