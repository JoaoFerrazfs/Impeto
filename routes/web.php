<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\OrderManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryRouteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ServicesController;

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
    return view('master.products.productRegistration');
});

Route::post('/validaCadastro',[ProductController::class,'store'])->middleware('auth');
Route::get('/meusProdutos/{id}',[ProductController::class,'myProducts'])->middleware('auth');
Route::get('/meusProdutos/editarProdutos/{id}',[ProductController::class,'editProducts'])->middleware('auth');
Route::get('/meusProdutos/editarProdutos/{id}',[ProductController::class,'editProducts'])->middleware('auth');
Route::post('/meusProdutos/salvaEdicao',[ProductController::class,'update'])->middleware('auth');
Route::post('/meusProdutos/order',[ProductController::class,'changeOrder'])->middleware('auth');
Route::post('/meusProdutos/availability',[ProductController::class,'changeAvailability'])->middleware('auth');
Route::delete('/meusProdutos/delete/{id}',[ProductController::class,'destroy'])->middleware('auth');
Route::get('/produtos',[ProductController::class,'index']);
Route::post('/visualizarProduto',[ProductController::class,'viewProduct']);
Route::post('/carrinho',[BudgetController::class,'makeShoppingList']);
Route::get('/carrinho/visualizar',[BudgetController::class,'showShoppingList']);
Route::post('/carrinho/excluir/item',[BudgetController::class,'deleteItemShoppingList']);
Route::post('/carrinho/excluir/carrinho',[BudgetController::class,'deleteCart']);
Route::get('/pedido',[BudgetController::class,'newBudget']);
Route::post('/carrinho/modifica/quantidade',[BudgetController::class,'updateQuantity']);
Route::post('/pedido/confirmado',[BudgetController::class,'saveBudget']);
Route::get('/pedidos/{id}',[OrderManagerController::class,'manager'])->middleware('auth');
Route::post('/pedidos/visualizar',[OrderManagerController::class,'showOrder']);
Route::post('/pedidos/atualizar',[OrderManagerController::class,'updateStatusOrder']);
Route::post('/pesquisaCPF',[ClientController::class,'findClient']);
Route::post('/novoBanner',[BannerController::class,'create']);



Route::get('/', function () {return view('welcome') ;});
Route::get('/formBanner', function () {return view('client.formBanner') ;});

Route::get('/confirmarPagamento', function () {return view('client.paymentProcess');});

Route::get('/pagamento',[PaymentController::class,'payments']);


Route::get('/geraPdf',[PdfController::class,'createPdf']);

Route::post('/frete',[DeliveryRouteController::class,'portage']);



Route::get('/prestador/registrar', function () {return view('master.services.servicesRegistration');
});

Route::post('/validaCadastroPrestador',[ServicesController::class,'create']);
Route::get('/prestador/visualizar',[ServicesController::class,'view'])->middleware('auth');
Route::get('/prestadores',[ServicesController::class,'viewAllServices']);


Route::post('/frete',[DeliveryRouteController::class,'portage']);

Route::get('/pesquisaPedido',[OrderManagerController::class,'searchOrder']);




