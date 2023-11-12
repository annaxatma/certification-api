<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Vehicle
{
    use HasFactory;
    protected $table = 'Motorcycle';
    protected $fillable = [
        'Baggage_Size',
        'Gasoline_Capacity'
    ];

    public function vehicle(){
        return $this->hasOne(Vehicle::class, 'Motorcycle_id', 'Vehicle_Id');
    }
}
