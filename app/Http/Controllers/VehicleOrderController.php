<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\VehicleOrder;
use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;

class VehicleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_order = VehicleOrder::with('vehicle')->get();

        return view('VehicleOrder', compact('vehicle_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_order = Order::all();
        $vehicle = Vehicle::all();
        return view('CreateVehicleOrder', compact('vehicle_order', 'vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle_order = VehicleOrder::create([
            'Order_id' => $request->Order_id,
            'Vehicle_Id' => $request->Vehicle_Id
        ]);
        
        return redirect(route('vehicle_order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle_order = Order::where('Vehicleorder_id', $id)->first();
        $vehicle = Vehicle::where('Vehicle_Id', $vehicle_order->Vehicle_Id)->first();
        
        if($vehicle->Vehicle_Type == "Car"){
            $vehicle = Car::where('Car_Id', $vehicle_order->Vehicle_Id)->first();
        } elseif ($vehicle->Vehicle_Type == "Truck") {
            $vehicle = Truck::where('Truck_Id', $vehicle_order->Vehicle_Id)->first();
        } elseif ($vehicle->Vehicle_Type == "Motorcycle") {
            $vehicle = Motorcycle::where('Motorcycle_Id', $vehicle_order->Vehicle_Id)->first();
        }

        $order = Order::where('Order_Id', $vehicle_order->Order_Id)->first();

        return view('VehicleOrderDetails', compact('vehicle_order', 'vehicle', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::all();
        $vehicle = Vehicle::all();
        $vehicle_order = VehicleOrder::where('Vehicleorder_id', $id)->first();
        return view('UpdateVehicleOrder', compact('order', 'vehicle', 'vehicle_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        VehicleOrder::where('Vehicleorder_id', $id)->update([
            'Order_id' => $request->Order_id,
            'Vehicle_Id' => $request->Vehicle_Id,
        ]);

        return redirect(route('vehicle_order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleOrder::where('Vehicleorder_id', $id)->delete();

        return redirect(route('vehicle_order.index'));
    }
}
