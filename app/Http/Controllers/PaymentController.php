<?php

namespace App\Http\Controllers;


require_once '../vendor/autoload.php';

use MercadoPago;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MergeValue;

class PaymentController extends Controller
{

    public function payments($cart)
    {

       
        $access_token_development = "TEST-3030807514700823-032620-68626e53e3b7e1846a8ec0fc3d3ea953-274055464";
        $access_token_production = "APP_USR-2053630564340672-032620-a23e9b35b6e030a09cd390f20f7db69e-274055464";
        
        MercadoPago\SDK::setAccessToken($access_token_development);
        $preference = new MercadoPago\Preference();

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
            "success" => "https://www.seu-site/success",
            "failure" => "http://127.0.0.1:8000/pedido",
            "pending" => "http://127.0.0.1:8000/"
        );
        $preference->auto_return = "approved";
        // ...


        $preference->save();
        $link = $preference->init_point;

      

        
        return $link;
    }
}
