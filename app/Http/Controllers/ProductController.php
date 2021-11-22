<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Session\Session;

class ProductController extends Controller
{
    public function store(Request $request)
    {

      
        
        $request = $this->data($request);
        $product =  new Product;       
        $product->name =  $request->name;
        $product->_id_supplier =  $request->_id_supplier;
        $product->description =  $request->description;
        $product->price =  $request->price;
        $product->image =  $request->image;
        $product->availability =  $request->availability;
        $product->order =  $request->order;
        $product->type =  $request->type;
        $product->inventory =  $request->inventory;

        $product->user = auth()->user()->_id;      

        $product->save();


        return  redirect('/');
    }

    public function data($request)
    {
        /*data type validation*/
        $request->price = floatval($request->price);
        $request->inventory = intval($request->price);

        if ($request->availability == null) {
            $request->availability = "Indisponivel";
        } else {
            $request->availability = "Disponível";
        }

        if ($request->order == null) {
            $request->order = "Pronta Entrega";
        } else {
            $request->order = "Encomenda";
        }

        /*image validation*/

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $request->image = $imageName;
        }
        return $request;
    }

    public function myProducts($user){
        $products = Product::where('user','=',$user)->get();
        
        return view('master.viewMyProducts', ['products'=>$products]);
    }

    public function editProducts($id){
        $products = Product::where('_id','=',$id)->get();
       
        return view('master.viewProduct', ['products'=>$products]);
    }

    
}
