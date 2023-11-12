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
        'Order_Id',
        'Vehicle_Id'
    ];
}
