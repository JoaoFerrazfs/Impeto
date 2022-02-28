<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class deliveryRouteController extends Controller
{
    
    public function portage(){

        $APIKey= "AIzaSyBwJOgp3_liIwXVbEO6Yk0QRekYvQgOM-o";

        $startAddress="Leroy Merlin Bh Norte";
        $endAddress ="Leroy Merlin Contagem";
        $link= "https://maps.googleapis.com/maps/api/directions/json?avoid=highways&destination=".$endAddress."&mode=bicycling&origin=".$startAddress."&key=".$APIKey;

        $response = Http::get($link)->json();

        $distance = $response['routes'][0]['legs'][0]['distance']['text'];

        dump($distance);

        
        

    }
}
