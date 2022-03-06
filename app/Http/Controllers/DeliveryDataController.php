<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DeliveryDataController extends Controller
{
    public function getDataDelivery($cep){

        

        $link = "https://viacep.com.br/ws/".$cep."/json/";
        $response = Http::get($link)->json();
        Session()->put('cep',$response['cep']);
        Session()->put('state',$response['uf']);
        Session()->put('town',$response['localidade']);
        Session()->put('street', $response['logradouro']);

        return  ;       
    }
}
