<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Vehicle
{
    use HasFactory;
    protected $table = 'Car';
    protected $fillable = [
        'Fuel_Type',
        'Trunk_Size'
    ];

    public function vehicle(){
        return $this->hasOne(Vehicle::class, 'Car_id', 'Vehicle_Id');
    }
}
