<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $primaryKey = 'Vehicle_Id';
    protected $keyType = 'integer';
    protected $table = 'Vehicle';
    protected $fillable = [
        'Model',
        'Year',
        'Total_Passenger',
        'Manufacturer',
        'Price',
        'Vehicle_Type',
    ];

    public function car(){
        return $this->hasOne(Car::class, 'Car_id', 'Vehicle_Id');
    }

    public function motorcycle(){
        return $this->hasOne(Motorcycle::class, 'Motorcycle_id', 'Vehicle_Id');
    }

    public function truck(){
        return $this->hasOne(Truck::class, 'Truck_id', 'Vehicle_Id');
    }

    public function vehicleOrder(){
        return $this->hasMany(VehicleOrder::class, 'Vehicleorder_id', 'Vehicle_Id');
    }
}
