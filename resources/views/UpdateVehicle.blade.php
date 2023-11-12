@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>update vehicle</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('vehicle.update', $vehicle->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Model : </label>
                        <input type="text" class="form-control" name="Model" value="{{ $vehicle->Model }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun : </label>
                        <input type="number" class="form-control" name="Year" value="{{ $vehicle->Year }}"required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah_Penumpang : </label>
                        <input type="number" class="form-control" name="Total_Passenger" value="{{ $vehicle->Total_Passenger }}"required>
                    </div>
                    <div class="form-group">
                        <label>Manufaktur : </label>
                        <input type="text" class="form-control" name="Manufacturer" value="{{ $vehicle->Manufacturer }}"required>
                    </div>
                    <div class="form-group">
                        <label>Harga : </label>
                        <input type="number" class="form-control" name="Price" value="{{ $vehicle->Price }}"equired>
                    </div>

                    <select id="Vehicle_Type" name="Vehicle_Type" required>
                        @if ($vehicle->Vehicle_Type == "Car")
                            <option value="Car" selected>Car</option>
                        @else
                            <option value="Car">Car</option>
                        @endif

                        @if ($vehicle->Vehicle_Type == "Motorcycle")
                            <option value="Motorcycle" selected>Motorcycle</option>
                        @else
                            <option value="Motorcycle">Motorcycle</option>
                        @endif

                        @if ($vehicle->Vehicle_Type == "Truck")
                            <option value="Truck" selected>Truck</option>
                        @else
                            <option value="Truck">Truck</option>
                        @endif
                    </select>

                    <div id="dynamicInput">
                        <!-- Dynamic input fields will be added here -->
                    </div>

                    <div id="dynamicInput2">
                        <!-- Dynamic input fields will be added here -->
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#Vehicle_Type').change(function() {
                                var selectedVehicle = $(this).val();
                                var inputField = '';
                                var inputField2 = '';
                        
                                if (selectedVehicle == 'Car') {
                                    @if ($vehicle->Vehicle_Type == "Car")
                                    inputField = 'Fuel_Type: <input type="text" name="Fuel_Type" value="{{ $vehicle->mobil->Fuel_Type }}" required>';
                                    inputField2 = 'Trunk_Size: <input type="number" name="Trunk_Size" value="{{ $vehicle->mobil->Trunk_Size }}" required>';
                                    @else
                                    inputField = 'Fuel_Type: <input type="text" name="Fuel_Type" required>';
                                    inputField2 = 'Trunk_Size: <input type="number" name="Trunk_Size" required>';
                                    @endif
                                } else if (selectedVehicle == 'Motorcycle') {
                                    @if ($vehicle->Vehicle_Type == "Motorcycle")
                                    inputField = 'Baggage_Size: <input type="number" name="Baggage_Size" value="{{ $vehicle->truck->Baggage_Size }}"required>';
                                    inputField2 = 'Gasoline_Capacity: <input type="number" name="Gasoline_Capacity" value="{{ $vehicle->truck->Gasoline_Capacity }}" required>';
                                    @else
                                    inputField = 'Baggage_Size: <input type="number" name="Baggage_Size" required>';
                                    inputField2 = 'Gasoline_Capacity: <input type="number" name="Gasoline_Capacity"  required>';
                                    @endif
                                } else if (selectedVehicle == 'Truck') {
                                    @if ($vehicle->Vehicle_Type == "Truck")
                                    inputField = 'Number_Wheels: <input type="text" id="jumlahBan" name="Number_Wheels" value="{{ $vehicle->motor->Number_Wheels }}" required>';
                                    inputField2 = 'Cargo_Size: <input type="number" name="Cargo_Size" value="{{ $vehicle->motor->Cargo_Size }}" required>';
                                    @else
                                    inputField = 'Number_Wheels: <input type="text" id="jumlahBan" name="Number_Wheels" required>';
                                    inputField2 = 'Cargo_Size: <input type="number" name="Cargo_Size" required>';
                                    @endif
                                }
                        
                                $('#dynamicInput').html(inputField);
                                $('#dynamicInput2').html(inputField2);
                            });
                        });
                    </script>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add Order</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
