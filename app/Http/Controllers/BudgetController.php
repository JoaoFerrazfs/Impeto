<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PdfController;
use PDF;
use App\Http\Controllers\PaymentController;




use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function makeShoppingList(Request $request)
    {

        $cart = $request->session()->get('cart');
        $cartAdd = [];
        $cartAdd['id'] = $request->id;
        $cartAdd['cod'] = $request->cod;
        $cartAdd['name'] = $request->name;
        $cartAdd['price'] = $request->price;
        $cartAdd['supplier'] = $request->supplier;
        $cartAdd['userSupplier'] = $request->userSupplier;
        $cartAdd['image']  = $request->image;
        $cartAdd['inventory'] = $request->inventory;
        $cartAdd['quantity'] = 1;
        $cartAdd['status'] = "Novo";

        $request->session()->push('cart', $cartAdd);



        return redirect('/carrinho/visualizar');
    }

    public function showShoppingList(Request $request)
    {
        $cart = $request->session()->get('cart');

        if ($cart == null) {
            return redirect()->back()->with('success', 'Você ainda não tem um carrinho!');
        } else {
            $quantity = 0;
            $amount = 0;

            foreach ($cart as $value) {
                $quantity = $value["quantity"];
                $amount =  $amount + ($quantity * $value["price"]);
            }

            return view('client.shoppingList', ['cart' => $cart, 'amount' => $amount]);
        }
    }

    public function deleteItemShoppingList(Request $request)
    {

        $key = $request->key;
        $cart = $request->session()->get('cart');
        unset($cart[$key]);
        session()->forget('cart');
        session()->put('cart', $cart);
        if(session()->put('cart', $cart) == null){
            return redirect('/produtos');
        }
        
        return redirect()->back();
    }

    public function deleteCart(Request $request)
    {
        session()->forget('cart');
        return redirect('/produtos');
    }

    public function updateQuantity(Request $request)
    {
        $key = $request->key;
        $cart = $request->session()->get('cart');


        $cart[$key]["quantity"] =  $request->amount;
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function newBudget(Request $request)
    {


        $user = new User();

        $cart = $request->session()->get('cart');
        $quantity = 0;
        $amount = 0;

        foreach ($cart as $value) {
            $quantity = $value["quantity"];
            $amount =  $amount + ($quantity * $value["price"]);
        }



        $cartData = [
            "cart" => $cart,
            "amount" => $amount
        ];

        $request->session()->put('cartAmout', $amount);


        return view('client.viewBudget', [
            'amount' => $amount,
            'cart' => $cart,
            // 'userData' => $userData
        ]);
    }

    public function saveBudget(Request $request)
    {

        $budget = new Budget();
        $Product = new ProductController;
        $client = new ClientController();
        $budgetNumber = Budget::all()->count() + 1;
        // $idCliente = auth()->user()->id;
        $cart = $request->session()->get('cart');

        $delivery = [
            "name" => $request->name,
            "phoneNumber" => $request->phoneNumber,
            "cpf" => $request->cpf,
            "cep" => $request->cep,
            "street" => $request->street,
            "state" => $request->state,
            "city" => $request->city,
            "number" => $request->number
        ];

        $client->store($delivery);

        // $budget->idClient = $idCliente;
        $budget->number = $budgetNumber;
        $budget->statusPayment = 'Em espera';
        $budget->delivery = $delivery;
        $budget->products = $cart;
        $budget->note =  $request->note;
        $budget->portage =  $request->session()->get('portage');
        $budget->amount =  $request->session()->get('cartAmout') + $request->session()->get('portage');
        foreach ($cart as $key => $value) {
            $id = $value['id'];
            $inventory = $value['quantity'];

            $Product->changedStore($id, $inventory);
        }
        $request->session()->put('budget', $budget);
        $budget->save(); 
        $payment = new PaymentController();
        $paymentLink = $payment->payments($cart);
        return redirect($paymentLink);
    }
}
