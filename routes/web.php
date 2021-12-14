<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

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
Route::post('/carrinho',[PurchaseController::class,'makeShoppingList']);    
Route::get('/carrinho/visualizar',[PurchaseController::class,'showShoppingList']);
Route::post('/carrinho/excluir/item',[PurchaseController::class,'deleteItemShoppingList']);
Route::post('/carrinho/excluir/carrinho',[PurchaseController::class,'deleteCart']);
Route::get('/pedido',[PurchaseController::class,'budget'])->middleware('auth');
Route::post('/carrinho/modifica/quantidade',[PurchaseController::class,'updateQuantity']); 
