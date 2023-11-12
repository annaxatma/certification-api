<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Vehicle
{
    use HasFactory;
    protected $table = 'Truck';
    protected $fillable = [
        'Number_Wheels',
        'Cargo_Size'
    ];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'Truck_Id', 'Vehicle_Id');
    }
}
