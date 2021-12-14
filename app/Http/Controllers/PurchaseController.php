<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Budget;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function makeShoppingList(Request $request)
    {

        $cart = $request->session()->get('cart');
        $cart['cod'] = $request->cod;
        $cart['name'] = $request->name;
        $cart['price'] = $request->price;
        $cart['image']  = $request->image;
        $cart['inventory'] = $request->inventory;
        $request->session()->push('cart', $cart);



        return redirect('/carrinho/visualizar');
    }

    public function showShoppingList(Request $request)
    {
        $cart = $request->session()->get('cart');


        return view('client.shoppingList', ['cart' => $cart]);
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

    public function budget(Request $request){

        dd($request->session()->all());

    }
}
