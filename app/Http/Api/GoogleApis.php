<?php

namespace App\Http\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleApis
{
    public function requestDirections($endAddress){
        $APIKey = getenv("KEY_GOOGLE_CLOUD");
        $startAddress = getenv("ADDRES");
        $link = "https://maps.googleapis.com/maps/api/directions/json?avoid=highways&destination=". $endAddress . "&mode=bicycling&origin=" . $startAddress .  "&key=" .    $APIKey;

       $response = Http::get($link)->json();

       dd($response);
        return $response;
    }
}
