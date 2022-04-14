<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * @var Banner
     */
    private $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
        
    }

    public function create(Request $request)
    {       

        $this->banner->name = $request['name'];
        $this->banner->phoneNumber =  $request['phoneNumber'];
        $this->banner->email = $request['email'];
        $this->banner->company = $request['company'];
        $this->banner->localization = $request['localization'];        
        $this->banner->showTime = $request['showTime'];



        /*image validation*/

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/newBanners'), $imageName);

            $request->image = $imageName;
        }

        $this->banner->image =$request->image;

      

        $this->banner->save();

        return redirect("/")->with('', 'Seu Pedido foi realizado! Logo entraremos em contato! ');
}
}
