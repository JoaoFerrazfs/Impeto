<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\MovementHistoryController;
use App\Models\MovementHistory;
use App\Http\Controllers;


class ProductController extends Controller
{
    public function store(Request $request)
    {



        $request = $this->data($request);
        $product =  new Product;
        $product->name =  $request->name;
        $product->cod =  $request->cod;
        $product->supplier =  $request->supplier;
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

        $request["price"] = floatval($request["price"]);
        $request["inventory"] = intval($request["inventory"]);

        if ($request["availability"] == null) {
            $request["availability"] = "Indisponivel";
        } else {
            $request["availability"] = "Disponível";
        }

        if ($request["order"] != "null") {
            $request["order"] = "Pronta Entrega";
        } else {
            $request["order"] = "Encomenda";
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

    public function myProducts($user)
    {
        $products = Product::where('user', '=', $user)->get();

        return view('master.viewMyProducts', ['products' => $products]);
    }

    public function editProducts($id)
    {
        $products = Product::where('_id', '=', $id)->get();

        return view('master.viewProduct', ['products' => $products]);
    }

    public function update(Request $request)
    {

        $product = new Product();



        $history = new MovementHistoryController();

        $dataHistory = Product::find($request["id"]);



        $requestHandled = $this->data($request);



        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $request->image = $imageName;
        }

        if ($request->image == null) {
            $request->image = $dataHistory->image;
        }

        if ($request->price != $dataHistory->price || $request->inventory != $dataHistory->inventory) {
            $history->productHistory($dataHistory);

            $data = [
                "cod" => $requestHandled['cod'],
                "name" => $requestHandled['name'],
                "supplier" => $requestHandled['supplier'],
                "price" => $requestHandled['price'],
                "description" => $requestHandled['description'],
                "inventory" => $requestHandled['inventory'],
                "availability" => $requestHandled['availability'],
                "type" => $requestHandled['type'],
                "image" =>   $request->image
            ];
        } else {

            $data = [
                "cod" => $requestHandled['cod'],
                "name" => $requestHandled['name'],
                "supplier" => $requestHandled['supplier'],
                "price" => $requestHandled['price'],
                "description" => $requestHandled['description'],
                "inventory" => $requestHandled['inventory'],
                "availability" => $requestHandled['availability'],
                "type" => $requestHandled['type'],
                "image" =>   $request->image
            ];
        }

        $user = auth()->user()->_id;
        Product::find($request['id'])->update($data);

        return redirect('/meusProdutos/' . $user);
    }

    public function changeState(Request $request)
    {
        $product = new Product();

        $requestArray = $request->all();

        $data = Product::find($request['id']);




        if (array_key_exists("order", $requestArray)) {

            if ($data["order"] == "Pronta Entrega") {
                $data = ["order" => "Encomenda"];

                Product::find($request['id'])->update($data);
            } else {
                $data = ["order" => "Pronta Entrega"];
                Product::find($request['id'])->update($data);
            }
        } else {

            if ($data["availability"] == "Disponível") {
                $data = ["availability" => "Indisponivel"];
                Product::find($request['id'])->update($data);
            } else {
                $data = ["availability" => "Disponível"];
                Product::find($request['id'])->update($data);
            }
        }


        return redirect('/meusProdutos/editarProdutos/' . $requestArray["id"]);
    }

    public function destroy($id)
    {
        $product = new Product();



        Product::where('_id', $id)->delete();
        $user = auth()->user()->_id;
        return redirect('/meusProdutos/' . $user);
    }

    public function index(){
        $product = new Product(); 
        $products = Product::where('availability', 'Disponível')->get();      
        return view('welcome', ['products' => $products]);
    }
    public function viewProduct(Request $request){      

        $product = new Product();         
        $request = $request->all();       
        $products = Product::find($request["id"]);

        if($products->availability != "Disponível"){
            return redirect('/');
        }else{
            return view('client.viewProductClient', ['products' => $products]);
        }

        
        
       
       

     

    }

   
}
