<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\Cliente::create([
            'name'=>'marta dorneles',
            'email'=>'marta.dorneles@hotmail.com',
            'ddd'=>'51',
            'fone1'=>'98888444',
            'logradouro'=>'rua almirante junior',
            'numero'=>'234',
            'complemento'=>'casa 13',
            'data_aniversario'=>'1990-10-11'
        ]);
    }
}
