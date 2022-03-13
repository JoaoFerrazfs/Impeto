<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function create(Request $request){

        $services= new Services();

        $services->user = auth()->user()->name; //User that register a new service
        $services->name = $request->name;
        $services->cod = $request->cod;
        $services->type = $request->type;
        $services->price = $request->price;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $request->image = $imageName;

        $services->save();

        return redirect('/dashboard')->with('success','O Prestador '.$request->name.' foi cadastrado com sucesso!');

    };
    
}
public function view(){
    $user = auth()->user()->name;
    $result = Services::where('user','admin')->get();    
    
   
    
    return view('master.services.viewServices',['results'=>$result]);
  
}
}