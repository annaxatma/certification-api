<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOrder extends Model
{
    use HasFactory;
    protected $primaryKey = 'Vehicleorder_id';
    protected $keyType = 'integer';
    protected $table = 'vehicle_order';
    protected $fillable = [
        'Order_id',
        'Vehicle_Id'
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'Vehicle_Id', 'Vehicle_Id');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'Order_id', 'Order_id');
    }
}
