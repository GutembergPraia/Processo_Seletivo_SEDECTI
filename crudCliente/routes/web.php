<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

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

Route::get('/', [ClientesController::class, 'index'])->name('list_clients');;
Route::get('/clientes/creat', [ClientesController::class, 'create'])->name("creat_client");
Route::post('/clientes/creat', [ClientesController::class, 'store']);
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']);

Route::get('/clientes/{id}', [ClientesController::class, 'load']);
Route::post('/clientes/{id}', [ClientesController::class, 'edit']);
