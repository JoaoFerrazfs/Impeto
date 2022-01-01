<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Budget;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class OrderManagerController extends Controller
{

  public function manager($supplier)
  {

    $orders = Budget::all();
    $products = [];
    $delivery = [];
    $updated_at = "";

    foreach ($orders as $key => $value) {
      $delivery = $value['delivery'];
      $updated_at = $value['updated_at'];



      foreach ($value['products'] as $key => $valueProducts) {
        if ($valueProducts['supplier'] == $supplier) {
          $products[$key] = $valueProducts;
          $products[$key]['date'] = $updated_at;
          $products[$key]['numberOrder'] = $value['number'];
          $products[$key]['idOrder'] = $value['_id'];
        }
      }

      $supplierOrder = [
        'delivery' => $delivery,
        'products' => $products,
      ];



      return view('master.viewOrders', ['supplierOrder' => $supplierOrder]);
    }
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


        if ($value['supplier'] ==  $supplier && $value['id'] == $products['idProduct'] ) {
          $productOrder = $value;
        };
      }
    }

    

    return view('master.viewOrderDetail', ['productOrder' => $productOrder,'deliveryOrder'=>$deliveryOrder]);
  }
}
