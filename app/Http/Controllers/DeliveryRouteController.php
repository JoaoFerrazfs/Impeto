<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DeliveryDataController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use  App\Http\Api\GoogleApis;


class DeliveryRouteController extends Controller
{
    private $googleApis;

    public function __construct(GoogleApis $googleApis)
    {
        $this->googleApis= $googleApis;
    }
    public function getCEP(Request $request)
    {
        $cep = $request->address;
        $msg = $this->portage($cep);
        return redirect()->back();
    }

    public function portage($cep) /*set route value*/
    {
        $dataDelivery = new DeliveryDataController();
        $response = $this->googleApis->requestDirections($cep);

        switch ($response['status']):
            case 'OK':
                switch($response['geocoded_waypoints'][1]['types'][0]):
                    case 'postal_code':
                        $dataDelivery->getDataDelivery($cep);
                        $distance = $response['routes'][0]['legs'][0]['distance']['text'];
                        $rate = 1; //taxa variavel do frete
                        $distance = floatval($distance);
                        $finalRate = $rate * $distance;
                        session()->put('portage', $finalRate);

                        return $status =['succes'=>'200'];
                    break;

                    default:
                        $this->setNull();
                        return ['success'=>'200'];

                    endswitch;
            default:
                    $this->setNull();
                    session()->put('portage', "CEP errado");

                return ['error'=>'400'];
        endswitch;

    }

    public function setNull(){

        Session()->put('cep', null);
        Session()->put('state', null);
        Session()->put('town', null);
        Session()->put('street', null);
        return null;

    }
}
