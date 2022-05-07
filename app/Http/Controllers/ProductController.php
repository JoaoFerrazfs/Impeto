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
    /**
      * @var MovementHistoryController
      */
    private $movementHistory;

    /**
      * @var Product
      */
    private $product;

    public function __construct(MovementHistoryController $movementHistory, Product $product)
    {
        $this->movementHistory = $movementHistory;
        $this->product =$product;
    }

    public function store(Request $request)
    {
        $request = $this->data($request);
        $this->product->name =  $request->name;
        $this->product->cod =  $request->cod;
        $this->product->supplier =  $request->supplier;
        $this->product->description =  $request->description;
        $this->product->price =  $request->price;
        $this->product->image =  $request->image;
        $this->product->availability =  $request->availability;
        $this->product->order =  $request->order;
        $this->product->type =  $request->type;
        $this->product->inventory =  $request->inventory;
        $this->product->user = auth()->user()->_id;
        $this->product->save();
        return redirect('/dashboard')->with('msg', 'Produto cadastrado com Sucesso');
        // return  redirect('/');
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
        dd($_SERVER);
        $products = $this->product->where('user', '=', $user)->get();
        return view('master.products.viewMyProducts', ['products' => $products]);
    }

    public function editProducts($id)
    {
        $products = $this->product->where('_id', '=', $id)->get();
        return view('master.products.viewProduct', ['products' => $products]);
    }

    public function update(Request $request)
    {
        $dataHistory = $this->product->find($request["id"]);
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
            $this->movementHistory->productHistory($dataHistory);
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
        $this->product->find($request['id'])->update($data);
        return redirect('/meusProdutos/' . $user);
    }

    public function changeState(Request $request)
    {
        $requestArray = $request->all();
        $data = $this->product->find($request['id']);
        if (array_key_exists("order", $requestArray)) {
            if ($data["order"] == "Pronta Entrega") {
                $data = ["order" => "Encomenda"];

                $this->product->find($request['id'])->update($data);
            } else {
                $data = ["order" => "Pronta Entrega"];
                $this->product->find($request['id'])->update($data);
            }
        } else {
            if ($data["availability"] == "Disponível") {
                $data = ["availability" => "Indisponivel"];
                $this->product->find($request['id'])->update($data);
            } else {
                $data = ["availability" => "Disponível"];
                $this->product->find($request['id'])->update($data);
            }
        }
        return redirect('/meusProdutos/editarProdutos/' . $requestArray["id"]);
    }

    public function destroy($id)
    {
        $this->product->where('_id', $id)->delete();
        $user = auth()->user()->_id;
        return redirect('/meusProdutos/' . $user);
    }

    public function index()
    {
        $products =$this->product->where('availability', 'Disponível')->get();
        return view('client.products.products', ['products' => $products]);
    }
    public function viewProduct(Request $request)
    {
        $request = $request->all();
        $products = $this->product->find($request["id"]);

        if ($products->availability != "Disponível") {
            return redirect('/');
        } else {
            return view('client.viewProductClient', ['products' => $products]);
        }
    }

    public function changedStore($id, $quantity)
    {
        $newInventory = 0;
        $product = $this->product->where('_id', $id)->get();
        foreach ($product as $key => $value) {
            $newInventory = $value->inventory - $quantity;
        }
        $inventory = ['inventory' => $newInventory];
        $product =$this->product->where('_id', $id)->update($inventory);
    }
}
