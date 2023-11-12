<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\VehicleOrder;
use App\Models\Vehicle;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('Order', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();

        $order->Name = $request->Name;
        $order->Address = $request->Address;
        $order->Phone = $request->Phone;
        $order->Id_Card = $request->Id_Card;

        $order->save();

        return redirect(route('order.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $order = Order::where('Order_id', $id)->first();
        // $vehicle_order = VehicleOrder::where('Vehicleorder_id', $id)->get();

        // $vehicle = [];

        // $totalprice = 0;

        // foreach($vehicle_order as $vo){
        //     $v = Vehicle::with(['Car', 'Motorcycle', 'Truck'])->where('id', $vo->Vehicle_Id)->first();
        //     $vehicle[] = $v;
        //     $totalprice += $v->Price;
        // }
        return view('ViewOrder', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $order = Order::where('Order_id', $id)->first();

        return view('UpdateOrder', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        Order::where('Order_id', $id)->update([
            'Name' => $request->Name,
            'Address' => $request->Address,
            'Phone' => $request->Phone,
            'Id_Card' => $request->Id_Card,
        ]);

        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('Order_id', $id)->delete();

        return redirect(route('order.index'));
    }
}
