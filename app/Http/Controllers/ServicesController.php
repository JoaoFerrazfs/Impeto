<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Admin\contents\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;


class ServicesController extends Controller
{
    private Image $image;
    private Services $services;

    public function __construct(Image $image, Services $services)
    {
        $this->image = $image;
        $this->services = $services;
    }

    public function create(Request $request): RedirectResponse
    {
        $data = $request->all();
        $data['user'] = auth()->user()->name;
        $data['image'] = $this->image->saveLocalImage($request);
        $this->services->fill($data)->save();

        return redirect('/dashboard')->with('msg', 'O Prestador ' . $request['name'] . ' foi cadastrado com sucesso!');
    }

    public function view(): View
    {
        $result = Services::where('user', 'admin')->get();

        return view('master.services.viewServices', ['results'=>$result]);
    }

    public function viewAllServices(): View
    {
        return view('client.services.services', ['results'=> Services::all()]);
    }


}
