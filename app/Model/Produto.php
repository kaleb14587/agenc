<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'produto','id');
    }
}
