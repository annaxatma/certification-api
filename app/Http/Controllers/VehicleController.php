<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::with(['Car', 'Motorcycle', 'Truck'])->get();

        return view('Vehicle', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateVehicle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $vehicle = Vehicle::create($request->only([
        //     'Model', 'Year', 'Total_Passenger', 'Manufacturer', 'Price', 'Vehicle_Type'
        // ]));
        
        $vehicle = new Vehicle();

        $vehicle->Model = $request->input('Model');
        $vehicle->Year = $request->input('Year');
        $vehicle->Total_Passenger = $request->input('Total_Passenger');
        $vehicle->Manufacturer = $request->input('Manufacturer');
        $vehicle->Price = $request->input('Price');
        $vehicle->Vehicle_Type = $request->input('Vehicle_Type');
        
        $vehicle->save();

        $vehicle_type = $request->input('Vehicle_Type');
        
        if ($vehicle_type == "Car") {
            // car() ambil function dari model vehicle (relasi ke car)
            $vehicle->car()->create([
                'Fuel_Type' => $request->input('Fuel_Type'),
                'Trunk_Size' => $request->input('Trunk_Size')
            ]);
        } elseif ($vehicle_type == "Motorcycle") {
            $vehicle->motorcycle()->create([
                'Baggage_Size' => $request->input('Baggage_Size'),
                'Gasoline_Capacity' => $request->input('Gasoline_Capacity')
            ]);
        } elseif ($vehicle_type == "Truck") {
            $vehicle->truck()->create([
                'Number_Wheels' => $request->input('Number_Wheels'),
                'Cargo_Size' => $request->input('Cargo_Size')
            ]);
        }
        
        return redirect(route('vehicle.index'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::with(['Car', 'Motorcycle', 'Truck'])->where('Vehicle_Id', $id)->first();

        return view('ViewVehicle', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::with(['Car', 'Motorcycle', 'Truck'])->where('Vehicle_Id', $id)->first();

        return view('UpdateVehicle', compact('vehicle'));
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
        $vehicle = Vehicle::where('Vehicle_Id', $id)->first();

        // check if the new update is the same as they use to be or not
        if($request->Vehicle_Type == $vehicle->Vehicle_Type){
            $vehicle->update([
                'Model' => $request->Model,
                'Year' => $request->Year,
                'Total_Passenger' => $request->Total_Passenger,
                'Manufacturer' => $request->Manufacturer,
                'Price' => $request->Price,
                'Vehicle_Type'=> $request->Vehicle_Type
            ]);
            
            if ($request->input('Vehicle_Type') == "Car"){
                $vehicle->car()->update([
                    'Fuel_Type' => $request->Fuel_Type,
                    'Trunk_Size' => $request->Trunk_Size,
                ]);

            } elseif ($request->input('Vehicle_Type') == "Motorcycle"){
                $vehicle->motorcycle()->update([
                    'Baggage_Size' => $request->Baggage_Size,
                    'Gasoline_Capacity' => $request->Gasoline_Capacity,
                ]);
        
            } elseif ($request->input('Vehicle_Type') == "Truck"){
                $vehicle->truck()->update([
                    'Number_Wheels' => $request->Number_Wheels,
                    'Cargo_Size' => $request->Cargo_Size,
                ]);
            }
        }else{
            // deleting the old vehicle type
            if ($request->input('Vehicle_Type') == "Car"){
                if ($vehicle->Vehicle_Type == "Car"){
                    Mobil::where('Car_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Motorcycle"){
                    Motor::where('Motorcycle_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Truck"){
                    Truck::where('Truck_Id', $id)->delete();
                }
                
                Vehicle::where('id', $id)->delete();
                $vehicle = Vehicle::create($request->only([
                    'Model', 'Tahun', 'Jumlah_Penumpang', 'Manufaktur', 'Harga', 'Vehicle_Type'
                ]));
                
                $car = Mobil::create([
                    'Car_id' => $vehicle->id,
                    'Fuel_Type' => $request->input('Fuel_Type'),
                    'Trunk_Size' => $request->input('Trunk_Size')
                ]);

            } elseif ($request->input('Vehicle_Type') == "Motorcycle"){
                if ($vehicle->Vehicle_Type == "Car"){
                    Mobil::where('Car_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Motorcycle"){
                    Motor::where('Motorcycle_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Truck"){
                    Truck::where('Truck_Id', $id)->delete();
                }
                
                Vehicle::where('id', $id)->delete();
                $vehicle = Vehicle::create($request->only([
                    'Model', 'Tahun', 'Jumlah_Penumpang', 'Manufaktur', 'Harga', 'Vehicle_Type'
                ]));
                
                $motorcycle = Motorcycle::create([
                    'Motorcycle_id' => $vehicle->id,
                    'Baggage_Size' => $request->input('Baggage_Size'),
                    'Gasoline_Capacity' => $request->input('Gasoline_Capacity')
                ]);
        
            } elseif ($request->input('Vehicle_Type') == "Truck"){
                if ($vehicle->Vehicle_Type == "Car"){
                    Mobil::where('Car_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Motorcycle"){
                    Motor::where('Motorcycle_id', $id)->delete();
                    
                } elseif ($vehicle->Vehicle_Type == "Truck"){
                    Truck::where('Truck_Id', $id)->delete();
                }
                
                Vehicle::where('id', $id)->delete();
                $vehicle = Vehicle::create($request->only([
                    'Model', 'Tahun', 'Jumlah_Penumpang', 'Manufaktur', 'Harga', 'Vehicle_Type'
                ]));
                
                $car = Mobil::create([
                    'Truck_Id' => $vehicle->id,
                    'Number_Wheels' => $request->input('Number_Wheels'),
                    'Cargo_Size' => $request->input('Cargo_Size')
                ]);
            }
        }
        return redirect(route('vehicle.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::where('Vehicle_Id', $id)->first();
        if ($vehicle->Vehicle_Type == "Car"){
            Car::where('Car_id', $id)->delete();
            
        } elseif ($vehicle->Vehicle_Type == "Motorcycle"){
            Motorcycle::where('Motorcycle_id', $id)->delete();
            
        } elseif ($vehicle->Vehicle_Type == "Truck"){
            Truck::where('Truck_Id', $id)->delete();
        }

        $vehicle->delete();
        return redirect(route('vehicle.index'));
    }
}
