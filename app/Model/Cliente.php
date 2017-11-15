<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   /* protected $attributes =[
        'name'=>'nome default',
        'email'=>'emailemail.default.com',
        'ddd'=>'55',
        'fone1'=>'9985148425',
        'logradouro'=>'rua avios da gaviao',
        'numero'=>'12',
        'complemento'=>'casa',
        'data_aniversario'=>'12-05-1990'
    ];*/
    protected $fillable = [
        'name',
        'email',
        'ddd',
        'fone1',
        'logradouro',
        'numero',
        'complemento',
        'data_aniversario'
    ];
    protected $guarded = [];
    public $rules = [
        'name'=>'required|min:3|max:40',
        'email'=>'email',
        'ddd'=>'required|min:2|max:3',
        'fone1'=>'required|min:8|max:20',
        'logradouro'=>'required|max:300',
        'numero'=>'min:1',
        'complemento'=>'min:2',
        'data_aniversario'=>'required',
        /*
        'name' => 'required|min:3|max:100',
        'number' => 'required|numeric|min:3|max:11',
        'active' => 'numeric',
        'category' => 'required',
        'description' => 'min:3|max:1000'
         */
    ];
    public function pedido(){
        return $this->hasMany('App\Model\Pedido','cliente');
    }
}
