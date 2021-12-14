<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function makeShoppingList(Request $request)
    {

        $cart = $request->session()->get('cart');
        $cart['id'] = $request->id;
        $cart['cod'] = $request->cod;
        $cart['name'] = $request->name;
        $cart['price'] = $request->price;
        $cart['image']  = $request->image;
        $cart['inventory'] = $request->inventory;
        $cart['quantity'] = 1;
        
        $request->session()->push('cart', $cart);



        return redirect('/carrinho/visualizar');
    }

    public function showShoppingList(Request $request)
    {
        $cart = $request->session()->get('cart');
        $quantity = 0;
        $amount=0;
      
        foreach ($cart as $value){
            $quantity = $value["quantity"];
            $amount =  $amount +( $quantity * $value["price"]);        
        }

       


        return view('client.shoppingList', ['cart' => $cart,'amount'=>$amount]);
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

    public function deleteCart(Request $request){
        session()->forget('cart');
        return redirect('/');
    }

    public function updateQuantity(Request $request){
        $key = $request->key;
        $cart = $request->session()->get('cart');

       
        $cart[$key]["quantity"] =  $request->amount;
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back();

        

    }

    public function budget(Request $request){
        $user= new User();

        $userData=[

            "id" => auth()->user()->id,
            "name" => auth()->user()->name

        ];
        
        

       
        $cart = $request->session()->get('cart');
        $quantity = 0;
        $amount=0;

        foreach ($cart as $value){
            $quantity = $value["quantity"];
            $amount =  $amount +( $quantity * $value["price"]);        
        }

        $cartData =[
            "cart"=> $cart,
            "amount" =>$amount
            
        ];


        dd($cartData);

    }
}
