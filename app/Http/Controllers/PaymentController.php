<?php

namespace App\Http\Controllers;

require_once '/home/joao/desenvolvimento/Projeto/Impeto/vendor/autoload.php';

use MercadoPago;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;

class PaymentController extends Controller
{

    public function payments($cart)
    {

       
        $access_token_development = "TEST-2053630564340672-021921-cb609bcd60dbce3d3d656e076b81ae18-274055464";
        $access_token_production = "APP_USR-2053630564340672-021921-cf7594ece4086e3920e52984d5892a55-274055464";
        MercadoPago\SDK::setAccessToken($access_token_production);
        $preference = new MercadoPago\Preference();
        $item = [];
        $frete = [];
        
        foreach ($cart as $key => $products) {


            $item[$key] = new MercadoPago\Item();

            $item[$key]->title = $products['name'];
            $item[$key]->quantity = $products['quantity'];
            $item[$key]->unit_price = $products['price'];
            $item[$key]->installments = $products['cod'];
        }
       

        $frete[$key] = new MercadoPago\Item();
        $frete[$key]->title = 'Frete';
        $frete[$key]->quantity = 1;
        $frete[$key]->unit_price = session()->get('portage');
        $frete[$key]->installments = 'Frete';



        $item =  array_merge($frete, $item);



        foreach ($item as  $key => $value) {

            $product[$key] = $item[$key];
        };
        $preference->items = $product;


        $preference->back_urls = array(
            "success" => '/pagamentoConfirmado',
            "failure" => 'http://127.0.0.1:8000/pedido',
            "pending" => '/pagamentoPendente'
        );

        $preference->notification_url = '#';
        $preference->external_reference = 001;
        $preference->save();
        $link = $preference->init_point;


        return $link;
    }
}
