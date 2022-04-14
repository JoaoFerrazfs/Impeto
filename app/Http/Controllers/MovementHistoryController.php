<?php

namespace App\Http\Controllers;
use App\Models\MovementHistory;

use Illuminate\Http\Request;

class MovementHistoryController extends Controller
{
    /**
     * @var MovomentHistory
     */
    private $movementHistory;
    public function __construct(MovementHistory $movementHistory)
    {
        $this->movementHistory = $movementHistory;
    }
    public function productHistory($data)
    {

       
     
        $this->movementHistory->cod=$data->cod;
        $this->movementHistory->name = $data->name;
        $this->movementHistory->supplier = $data->supplier;
        $this->movementHistory->description=$data->description;
        $this->movementHistory->price=$data->price;
        $this->movementHistory->inventory=$data->inventory;
        $this->movementHistory->user=$data->user;
        $this->movementHistory->save();
    }
}
