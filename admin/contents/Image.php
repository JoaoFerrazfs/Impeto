<?php

namespace Admin\contents;

use Illuminate\Http\Request;

class Image
{
    public function saveLocalImage(Request $request): ?string
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){

            return  null;
        }

        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        $requestImage->move(public_path('img/products'), $imageName);

        return $imageName;
    }

}
