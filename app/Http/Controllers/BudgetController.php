<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function makeShoppingList(Request $request)
    {

        $cart = $request->session()->get('cart');
        $cartAdd=[];
        $cartAdd['id'] = $request->id;
        $cartAdd['cod'] = $request->cod;
        $cartAdd['name'] = $request->name;
        $cartAdd['price'] = $request->price;
        $cartAdd['image']  = $request->image;
        $cartAdd['inventory'] = $request->inventory;
        $cartAdd['quantity'] = 1;

        $request->session()->push('cart', $cartAdd);



        return redirect('/carrinho/visualizar');
    }

    public function showShoppingList(Request $request)
    {
        $cart = $request->session()->get('cart');
        $quantity = 0;
        $amount = 0;

        foreach ($cart as $value) {
            $quantity = $value["quantity"];
            $amount =  $amount + ($quantity * $value["price"]);
        }




        return view('client.shoppingList', ['cart' => $cart, 'amount' => $amount]);
    }

    public function deleteItemShoppingList(Request $request)
    {

        $key = $request->key;
        $cart = $request->session()->get('cart');
        unset($cart[$key]);
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function deleteCart(Request $request)
    {
        session()->forget('cart');
        return redirect('/');
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
        $userData = [
            "id" => auth()->user()->id,
            "name" => auth()->user()->name
        ];
        
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


       

        return view('client.viewBudget', [
            'amount' => $amount,
            'cart' => $cart,
            'userData' => $userData
        ]);
    }

    public function saveBudget (Request $request){
        $budget = new Budget();

        $data = [
            "name"=> $request->name,
            "phoneNumber"=> $request->phoneNumber,
            "CEP"=> $request->CEP,
            "street"=> $request->street,
            "number"=> $request->number,
        ];

        $cart = $request->session()->get('cart');

        $dataBudget=[
            "delivery" =>$data,
            "products" =>$cart
        ];
       
        $budget->idCliente = auth()->user()->id;
        $budget->dataBuget = $dataBudget;
       $budget->save();
       
    }
}
