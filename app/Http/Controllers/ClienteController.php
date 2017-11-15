<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $clientes)
    {
        $this->middleware('auth');
        $this->cliente = $clientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Cliente Controller";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('painel/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->except('_token');

        $this->validate($request, $this->cliente->rules);

        $insert = $this->cliente->insert($dataForm);

        if ($insert) {
            return redirect('/home')->with('message', 'Novo cliente inserido com sucesso');
        } else {


            return redirect()->back()->with('message', 'Ocorreu algum erro ao inserir');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id="")
    {

        $name_search = $request->input('name');
        if (isset($name_search) && !empty($name_search)) {

            $clientes = DB::table('clientes')
                ->where('name', 'like', $name_search . '%')
                ->get();
            return compact('clientes');
        }

        return "esta na função show()";


    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edita o palhaco do id.. ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "salva as edicoes id.. ";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
