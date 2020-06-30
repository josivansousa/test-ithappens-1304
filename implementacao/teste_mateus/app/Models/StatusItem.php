<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusItem extends Model
{
    public $table = 'status_item';
    public $fillable = [
        'status_item',
    ];

    public $timestamps = false;

}
