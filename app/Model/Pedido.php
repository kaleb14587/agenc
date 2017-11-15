<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable=[
      'cliente',
        'produto',
        'data_entrega',
        'descricao'
    ];
    protected $rules=[
        'cliente'=>'required|number|min:1',
        'produto'=>'required|number|min:1',
        'data_entrega'=>'required|datetime'
    ];

    public function cliente(){
        return $this->hasOne(Cliente::class,'id');
    }
    public function produto(){
        return $this->hasMany(Produto::class,'id','produto');
    }

}
