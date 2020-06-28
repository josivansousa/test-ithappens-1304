<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    public $table = 'formas_pagamento';
    public $fillable = [
        'forma_pagamento',
    ];
}
