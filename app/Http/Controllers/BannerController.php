<?php

namespace App\Http\Controllers;

use App\Models\Banner;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function create(Request $request)
    {

        $banner = new Banner();

        $banner->name = $request['name'];
        $banner->phoneNumber =  $request['phoneNumber'];
        $banner->email = $request['email'];
        $banner->company = $request['company'];
        $banner->localization = $request['localization'];        
        $banner->showTime = $request['showTime'];



        /*image validation*/

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/newBanners'), $imageName);

            $request->image = $imageName;
        }

        $banner->image =$request->image;

      

        $banner->save();

        return redirect("/")->with('success', 'Seu Pedido foi realizado! Logo entraremos em contato! ');
}
}
