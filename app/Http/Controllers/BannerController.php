<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function create(Request $request)
    {
        switch ($request['name']):
        case null:
                 
            return $alert="Precisamos que do seu nome para realizar o pedido";
                
        break;

        default:


                /*image validation*/

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5(
                    $requestImage->getClientOriginalName()
                    .strtotime("now")
                ). "." . $extension;
                $requestImage->move(public_path('img/newBanners'), $imageName);
                $request->image = $imageName;
            }

                    $banner = [
                        "name" => $request['name'],
                        "phoneNumber" => $request['phoneNumber'],
                        "email" => $request['email'],
                        "company" => $request['company'],
                        "localization" => $request['localization'],
                        "showTime" => $request['showTime'],
                        "image" => $request->image,
                    ];

                    Banner::create($banner);

            return redirect("/")->with('', 'Seu Pedido foi realizado! Logo entraremos em contato! ');
        endswitch;
    }
}
