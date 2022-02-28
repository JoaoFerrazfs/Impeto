<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class deliveryRouteController extends Controller
{

    public function portage(Request $request)
    {



        $APIKey = "AIzaSyBwJOgp3_liIwXVbEO6Yk0QRekYvQgOM-o";



        $startAddress = "32210-180";
        $endAddress = $request->address;


        $link = "https://maps.googleapis.com/maps/api/directions/json?avoid=highways&destination=" . $endAddress . "&mode=bicycling&origin=" . $startAddress . "&key=" . $APIKey;

        $response = Http::get($link)->json();




        if ($response['status'] != "OK") {
            return redirect()->back()->with('success', 'O endereço passado não foi encontrado ou não existe');
        } else {

            $distance = $response['routes'][0]['legs'][0]['distance']['text'];
            
            $rate = 0.5;
           
            $distance = floatval($distance);

          
            $finalRate = $rate * $distance;

            $request->session()->put('portage',$finalRate);
            return redirect()->back()->with('success', 'Valor do frete: R$ '.$finalRate.'  Distancia: '.$distance.' km');

        }




        
    }
}
