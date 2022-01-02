<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class OrderManagerController extends Controller
{

  public function manager($supplier)
  {



    $order = Budget::all()->count();


    $orders = Budget::where('products.supplier', $supplier)->get();

    $interactionsNumber = Budget::where('products.supplier', $supplier)->get()->count();

    $products = [];
    $delivery = [];
    $updated_at = "";


    foreach ($orders as $key => $teste) {
      
      $delivery = $teste['delivery'];

      foreach ($teste['products'] as $newKey => $value){
      
      $supplierOrder[$key][$newKey] = [
        'delivery' => $delivery,
        'products' => [
          'id' => $value['id'],
          'cod' => $value['cod'],
          'name' => $value['name'],
          'price' => $value['price'],
          'supplier' => $value['supplier'],
          'userSupplier' => $value['userSupplier'],
          'image' => $value['image'],
          'inventory' => $value['inventory'],
          'quantity' => $value['quantity'],
          'date' => $updated_at,
          'numberOrder' => $teste['number'],
          'idOrder' => $teste['_id'],
          'date' => $teste['updated_at']
        ],

       
      ];

      if($supplierOrder[$key][$newKey]['products']['supplier'] != $supplier){
        unset($supplierOrder[$key][$newKey]);
      }
      
     
    }
  }



    dd($supplierOrder);


    return view('master.viewOrders', ['supplierOrder' => $supplierOrder]);
  }

  public function showOrder(Request $request)
  {

    $products = $request->all();
    $product = Budget::find($request->idOrder)->get();
    $supplier = auth()->user()->supplier;
    $deliveryOrder =  $product[0]['delivery'];
    $productOrder = [];



    foreach ($product as $key => $valuet) {


      foreach ($valuet['products'] as $key => $value) {


        if ($value['supplier'] ==  $supplier && $value['id'] == $products['idProduct']) {
          $productOrder = $value;
        };
      }
    }



    return view('master.viewOrderDetail', ['productOrder' => $productOrder, 'deliveryOrder' => $deliveryOrder]);
  }
}
