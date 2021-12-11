<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function makeShoppingList(Request $request){  

        $cart = $request->session()->get('cart');       
                $cart['cod'] = $request->cod;               
                $cart['name'] = $request->name;
                $cart['price'] =$request->price;
                $cart['image']  = $request->image;   
        $request->session()->push('cart',$cart);

       
        
        return redirect('/carrinho/visualizar');
    }

    public function showShoppingList(Request $request){
        $cart = $request->session()->get('cart');

       
        return view('client.shoppingList', ['cart' => $cart]);      

    }
}
