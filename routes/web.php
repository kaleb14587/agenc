<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){

    Route::resource('/cliente','ClienteController');
    Route::resource('/pedido','PedidoController');
    Route::get('/home/{id?}', 'HomeController@index')->name('home');

    // Display view
    Route::get('datatable', 'DataTableController@datatable')->name('tabela/clientes');
// Get Data
    Route::get('datatable/getdata', 'DataTableController@getPosts')->name('getdata/clientes');
});


