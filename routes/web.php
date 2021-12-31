<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\OrderManagerController;
use App\Http\Controllers\ProductController;


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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/cadastroProduto', function () {
    return view('master.productRegistration');
});

Route::post('/validaCadastro',[ProductController::class,'store'])->middleware('auth');
Route::get('/meusProdutos/{id}',[ProductController::class,'myProducts'])->middleware('auth');
Route::get('/meusProdutos/editarProdutos/{id}',[ProductController::class,'editProducts'])->middleware('auth');
Route::post('/meusProdutos/salvaEdicao',[ProductController::class,'update'])->middleware('auth');
Route::post('/meusProdutos/status',[ProductController::class,'changeState'])->middleware('auth');
Route::delete('/meusProdutos/delete/{id}',[ProductController::class,'destroy'])->middleware('auth');
Route::get('/',[ProductController::class,'index']);
Route::post('/visualizarProduto',[ProductController::class,'viewProduct']);
Route::post('/carrinho',[BudgetController::class,'makeShoppingList']);    
Route::get('/carrinho/visualizar',[BudgetController::class,'showShoppingList']);
Route::post('/carrinho/excluir/item',[BudgetController::class,'deleteItemShoppingList']);
Route::post('/carrinho/excluir/carrinho',[BudgetController::class,'deleteCart']);
Route::get('/pedido',[BudgetController::class,'newBudget'])->middleware('auth');
Route::post('/carrinho/modifica/quantidade',[BudgetController::class,'updateQuantity']);
Route::post('/pedido/confirmado',[BudgetController::class,'saveBudget']) ->middleware('auth');
Route::get('/pedidos/{id}',[OrderManagerController::class,'manager'])->middleware('auth');
