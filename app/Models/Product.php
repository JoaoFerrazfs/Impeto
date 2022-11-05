<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function isOrder(): bool
    {
        return $this->order == "Encomenda" ;
    }

    public function isAvailable(): bool
    {
        return $this->availability == "Disponível" ;
    }
}
