<?php

namespace App\Http\Controllers;


use App\Model\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;


class DataTableController extends Controller
{
    public function datatable(){
        return view('teste.datatable');
    }
    public function getPosts()
    {
        return DataTables::of(Cliente::query())->make(true);
    }
}
