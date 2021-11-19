<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $product =  new Product;
        $product->name =  $request->name;
        $product->_id_supplier =  $request->_id_supplier;
        $product->description =  $request->description;
        $product->price =  $request->price;
        $product->image =  $request->image;
        $product->availability =  $request->availability;
        $product->save();


        return  redirect('/');
    }
}
