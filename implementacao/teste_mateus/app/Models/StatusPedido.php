<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPedido extends Model
{
    public $table = 'status_pedido';
    public $fillable = [
        'status_pedido',
    ];
    public $timestamps = false;

}
