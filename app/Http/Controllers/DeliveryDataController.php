<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DeliveryDataController extends Controller
{
    public function getDataDelivery($cep)
    {
        $request = new Request();

        $link = "https://ws.apicep.com/cep/".$cep.".json";
        $response = Http::get($link)->json();
        Session()->put("cep", $response['code']);
        Session()->put("state", $response['state']);
        Session()->put("town", $response['city']);
        Session()->put("street", $response['address']);

        return  ;
    }
}
