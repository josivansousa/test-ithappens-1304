<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    public $table = 'itens_pedido';
    public $fillable = [
        'pedido_estoque_id',
        'produto_id',
        'qtd',
        'status_id',
        'valor_unitario',
    ];

    public function pedidosEstoque(){
        return $this->hasOne("App\Models\PedidoEstoque");
    }

    public function produtos(){
        return $this->hasOne("App\Models\Produto");
    }

    public function status(){
        return $this->hasOne("App\Models\Status");
    }
}
