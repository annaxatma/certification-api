<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'Order_id';
    protected $keyType = 'integer';
    protected $table = 'order';
    protected $fillable = [
        'Name',
        'Address',
        'Phone',
        'Id_Card'
    ];

    public function vehicleOrder(){
        return $this->hasMany(VehicleOrder::class, 'Order_id', 'id');
    }
}
