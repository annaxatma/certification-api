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
        return $this->belongsTo(Car::class, 'Vehicle_Id', 'car_id');
    }

    public function motorcycle(){
        return $this->belongsTo(Motorcycle::class, 'Vehicle_Id', 'motorcycle_id');
    }

    public function truck(){
        return $this->belongsTo(Truck::class, 'Vehicle_Id', 'truck_id');
    }

    public function vehicleOrder(){
        return $this->hasMany(VehicleOrder::class, 'Vehicle_Id', 'vehicleorder_id');
    }
}
