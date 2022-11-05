<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function findClient(Request $request)
    {       
        $data = $this->client::where('cpf', $request->cpf)->get();    
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
      

        try {

            switch ($validate):
            case null:
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
                break;
            default:
                throw new Exception("Clinte já cadastrado");

            endswitch;

        } catch (Exception $e) {
                $e->getMessage();
        };

       
    }
}
