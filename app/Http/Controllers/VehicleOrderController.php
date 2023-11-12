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
        $vehicle_order = Order::all();

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
            'Order_Id' => $request->Order_Id,
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
        $vehicle = Vehicle::where('id', $vehicle_order->Vehicle_Id)->first();
        
        if($vehicle->Vehicle_Type == "Mobil"){
            $vehicle = Mobil::where('Mobil_ID', $vehicle_order->Vehicle_Id)->first();
        } elseif ($vehicle->Vehicle_Type == "Truk") {
            $vehicle = Truck::where('Truck_ID', $vehicle_order->Vehicle_Id)->first();
        } elseif ($vehicle->Vehicle_Type == "Motor") {
            $vehicle = Motor::where('Motor_ID', $vehicle_order->Vehicle_Id)->first();
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

        $vehicle_order = Order::all();
        $vehicle = Vehicle::all();
        $vehicle_order = VehicleOrder::where('Vehicleorder_id', $id)->first();
        return view('UpdateVehicleOrder', compact('vehicle_order', 'vehicle', 'vehicle_order'));
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
            'Customer_ID' => $request->Customer_ID,
            'Kendaraan_ID' => $request->Kendaraan_ID,
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
