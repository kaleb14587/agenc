<?php

namespace App\Http\Controllers;

use App\Model\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Pedido;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $pedido;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedi)
    {
        $this->pedido = $pedi;
        $this->middleware('auth');
    }

    public function getCliente($id)
    {
        $cliente = DB::table('clientes')
            ->where('id', $id)
            ->get();//$this->cliente->where(' name ',' like ',$name_search.'%')->get();
        return $cliente;
    }

    public function getproduto($id)
    {
        $produto = DB::table('produtos')
            ->where('id', $id)
            ->get();//$this->cliente->where(' name ',' like ',$name_search.'%')->get();
        return $produto;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id = '')
    {

        if (!empty($id) && is_numeric($id)) {
            /*$pedidos = $this->pedido
                ->with('cliente')->where('cliente', $id)
                ->get();*/
            $cliente = \App\Model\Cliente::find($id);
            //dd($cliente->name );
            return view('painel/home', compact('cliente','pedidos', 'produto'));
        }

        //$produtos = Produto::get();
        $pedidos = $this->pedido
            ->where('data_entrega', '>', Carbon::now())
            ->get();
        return view('painel/painelinicial', compact('pedidos'));
    }
}
