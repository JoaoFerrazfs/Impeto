<?php

namespace App\Models;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'cpf';
    protected $name;
    protected $honeNumber;
    protected $street;
    protected $state;
    protected $city;
    protected $number;

}
