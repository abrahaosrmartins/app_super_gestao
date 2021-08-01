<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PrincipalController::class, 'index'])->name('site.index')->middleware('log.acesso');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('sobre_nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])
        ->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'Produtos';
    })->name('app.produtos');
});
