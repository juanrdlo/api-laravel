<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function orders()
    {
        return Order::where('routeId', '=', $this->id)->get();
    }

    public function driverData()
    {
        return Driver::where('id', '=', $this->driverId)->first();
    }
}
