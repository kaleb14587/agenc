<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 22/10/2017
 * Time: 14:14
 */

namespace App\Http\Repository;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    abstract function remove(Model $obj=null ,$id=null);
    abstract function addAll(Model $arrayObj= []);
    abstract function add(Model $obj= null);
    abstract function all($paginate=null,$numberPerPage=null);
}