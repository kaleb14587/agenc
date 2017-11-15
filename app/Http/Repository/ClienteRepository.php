<?php

namespace App\Http\Repository;

use App\Http\Repository\BaseRepository;
use App\Model\Cliente;
use Illuminate\Database\Eloquent\Model;

class ClienteRepository extends BaseRepository
{
    /*
     * $cliente Cliente
     */
    private $cliente;

    public function __construct()
    {
        $cliente = new Cliente();
    }

    function remove(Model $obj = null, $id = null)
    {
        // TODO: Implement remove() method.
    }

    function addAll(Model $arrayObj = [])
    {
        // TODO: Implement addAll() method.
    }

    function add(Model $obj = null)
    {
        // TODO: Implement add() method.
    }

    function all($paginate = null, $numberPerPage = null)
    {
        // TODO: Implement all() method.
    }
}