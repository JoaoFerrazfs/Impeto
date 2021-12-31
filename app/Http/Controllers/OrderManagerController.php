<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;

use Illuminate\Http\Request;

class OrderManagerController extends Controller
{
    
    public function manager($id){
       $orders = Budget:: where('products.userSupplier',$id)->get();
      return view('master.viewOrders',['orders'=>$orders]);
    }
}
