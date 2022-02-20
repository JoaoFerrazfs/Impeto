<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use GrahamCampbell\ResultType\Result;

class ClientController extends Controller

{

    public function findClient(Request $request)
    {

        $client = new Client();

        $data = $client::where('cpf', $request->cpf)->get();

     
    }

    public function find($cpf)
    {
        $client = new Client();
        $data = $client::where('cpf', $cpf)->get()->first();
        return $data;
    }


    public function store($data)
    {

        $cpf = $data['cpf'];
        $validate = $this->find($cpf);



        if ($validate == null) {

            $client = new Client();
            $client->name = $data['name'];
            $client->cpf = $data['cpf'];
            $client->phoneNumber = $data['phoneNumber'];
            $client->cep = $data['cep'];
            $client->state = $data['state'];
            $client->city = $data['city'];
            $client->street = $data['street'];
            $client->number = $data['number'];
            $client->save();
        } else {
            //dump($this->find($data['cpf']));
        }
    }
}
