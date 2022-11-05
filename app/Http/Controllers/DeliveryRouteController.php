<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DeliveryDataController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class deliveryRouteController extends Controller
{

    public function portage(Request $request) /*set route value*/
    {
        $dataDelivery = new DeliveryDataController();
        $APIKey = "AIzaSyBwJOgp3_liIwXVbEO6Yk0QRekYvQgOM-o";
        $startAddress = "32210-180";
        $endAddress = $request->address;
        $link = "https://maps.googleapis.com/maps/api/directions/json?avoid=highways&destination=" . $endAddress . "&mode=bicycling&origin=" . $startAddress . "&key=" . $APIKey;
        $response = Http::get($link)->json();
       


        switch ($response['status']):
        case 'OK':
            switch($response['geocoded_waypoints'][1]['types'][0]):
            case 'postal_code':
                $dataDelivery->getDataDelivery($request->address);
                $distance = $response['routes'][0]['legs'][0]['distance']['text'];
                $rate = 1; //taxa variavel do frete
                $distance = floatval($distance);
                $finalRate = $rate * $distance;
                $request->session()->put('portage', $finalRate);
                return redirect()->back()->with('msg', 'Valor do frete: R$ ' . $finalRate . '  Distancia: ' . $distance . ' km');
                break;
                    
            default:
                $this->setNull(); 
                $distance = $response['routes'][0]['legs'][0]['distance']['text'];
                $rate = 1; //taxa variavel do frete
                $distance = floatval($distance);
                $finalRate = 1 ; //$rate * $distance *  //valor do frete
                $request->session()->put('portage', $finalRate);
                return redirect()->back()->with('msg', 'Valor do frete: R$ ' . $finalRate . '  Distancia: ' . $distance . ' km'); 
            endswitch; 
            default:
                    $this->setNull();
                    $request->session()->put('portage', null);
                   
            return redirect()->back()->with('msg', 'O endereço passado não foi encontrado ou não existe');
        endswitch;     
      
    }

    public function setNull()
    {

        Session()->put('cep', null);
        Session()->put('state', null);
        Session()->put('town', null);
        Session()->put('street', null);
        return null;

    }
}
