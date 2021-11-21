<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
 
    public function index(){
        $user = auth()->user()->_id;   
    }

}
