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

    $delivery = [];
    $updated_at = "";
    $orders = Budget::all();
    foreach ($orders as $key => $firtValue) {

      $delivery = $firtValue['delivery'];

      foreach ($firtValue['products'] as $newKey => $value) {


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
            'numberOrder' => $firtValue['number'],
            'idOrder' => $firtValue['_id'],
            'date' => $firtValue['updated_at'],
            'status' => $value['status']
          ],
          'note' => $firtValue['note'],
          'date' => $firtValue['created_at'],
        ];


        if ($supplierOrder[$key][$newKey]['products']['supplier'] != $supplier) {
          unset($supplierOrder[$key][$newKey]);
        }
      }
    }
    $supplierOrder = array_filter($supplierOrder);
    if ($supplierOrder == null) {

      return redirect()->back()->with('success', 'Não há nenhum novo pedido');
    } else {
      return view('master.orders.viewOrders', ['supplierOrder' => $supplierOrder]);
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


        if ($value['supplier'] ==  $supplier && $value['id'] == $products['idProduct']) {
          $productOrder = $value;
        };
      }
    }


    return view('master.orders.viewOrderDetail', ['productOrder' => $productOrder, 'deliveryOrder' => $deliveryOrder, 'idOrder' => $products['idOrder']]);
  }

  public function updateStatusOrder(Request $request)
  {

    $order = Budget::where('_id', $request->id)->get();
    $orders = json_decode($order, true);

    foreach ($orders as $key => $value) {
      foreach ($value['products'] as $newkey => $newValue) {
        $products[$newkey] = $newValue;

        if ($newValue['name'] == $request['name']) {
          $products[$newkey]['status'] =   $request['status'];
        }
      }
    };

    $order = ['products' => $products];

    Budget::find($request['id'])->update($order);

    return redirect('/pedidos/' . auth()->user()->supplier);
  }

  public function searchOrder(Request $request){

    $budget = new Budget();
    $result = Budget::where('delivery.cpf','=',$request->cpf)->get();

    return view('client.payments.payment',['result'=>$result]);



  }
}
