<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\Produto::create([
            'nome'=>'Produto teste',
            'descricao'=>' recheios de testes padroes e ingredientes ou descricao de modelo',
            'valor'=>30.00
        ]);
    }
}
