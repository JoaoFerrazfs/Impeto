<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Admin\contents\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private Product $product;
    private Image $image;

    public function __construct(Product $product, Image $image)
    {
        $this->product = $product;
        $this->image = $image;
    }

    public function store(Request $request): RedirectResponse
    {
        $formData = $request->all();
        $formData['image'] = $this->image->saveLocalImage($request);
        $product = $this->product->fill($formData);

        $product->save();

        return redirect('/dashboard')->with('msg', 'Produto cadastrado com Sucesso');
    }

    public function myProducts(string $userId): View
    {
        $products = Product::where('supplier', '=', $userId)->get();

        return view('master.products.viewMyProducts', ['products' => $products]);
    }

    public function editProducts(string $productId): View
    {
        $products = Product::where('_id', '=', $productId)->get();

        return view('master.products.viewProduct', ['products' => $products]);
    }

    public function update(Request $request): RedirectResponse
    {
        $product = Product::find($request['id']);
        $formData = $request->all();
        $formData['image'] = $this->image->saveLocalImage($request);
        $user = auth()->user()->supplier;
        $product->update($formData);

        return redirect('/meusProdutos/' . $user);
    }

    public function changeOrder(Request $request): RedirectResponse
    {
        $product = Product::find($request['id']);
        $delivery = $product->isOrder($product->order);
        $delivery ? $product->update(['order' => 'Pronta Entrega']) : $product->update(['order' => 'Encomenda']);

        return redirect('/meusProdutos/editarProdutos/' . $request->id);

    }

    public function changeAvailability(Request $request): RedirectResponse
    {
        $product = Product::find($request['id']);
        $availability = $product->isAvailable();
        $availability ? $product->update(['availability' => 'Indisponivel']) : $product->update(['availability' => 'Disponível']);

        return redirect('/meusProdutos/editarProdutos/' . $request->id);

    }

    public function destroy($id): RedirectResponse
    {
        Product::where('_id', $id)->delete();
        $user = auth()->user()->_id;
        return redirect('/meusProdutos/' . $user);
    }

    public function index(): View
    {
        $products = Product::where('availability', 'Disponível')->get();
        return view('client.products.products', ['products' => $products]);
    }

    public function viewProduct(Request $request): View
    {
        $request = $request->all();
        $products = Product::find($request['id']);

        if($products->availability != 'Disponível') {
            return view('welcome');
        }

        return view('client.viewProductClient', ['products' => $products]);
    }

    public function changedStore(string $id, int $quantity): void
    {
        $newInventory = 0;
        $product = Product::where('_id', $id)->get();

        foreach ($product as $value) {
            $newInventory = $value->inventory - $quantity;
        }

        $inventory = ['inventory' => $newInventory];
        $product->update($inventory);
    }
}
