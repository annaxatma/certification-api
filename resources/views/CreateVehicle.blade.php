@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Add new Kenderaan</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('vehicle.store') }}" method="post">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Model : </label>
                        <input type="text" class="form-control" name="Model" required>
                    </div>
                    <div class="form-group">
                        <label>Year : </label>
                        <input type="number" class="form-control" name="Year" required>
                    </div>
                    <div class="form-group">
                        <label>Total_Passenger : </label>
                        <input type="number" class="form-control" name="Total_Passenger" required>
                    </div>
                    <div class="form-group">
                        <label>Manufacturer : </label>
                        <input type="text" class="form-control" name="Manufacturer" required>
                    </div>
                    <div class="form-group">
                        <label>Price : </label>
                        <input type="number" class="form-control" name="Price" required>
                    </div>

                    <select id="Vehicle_Type" name="Vehicle_Type" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Car">Mobil</option>
                        <option value="Truck">Truk</option>
                        <option value="Motorcycle">Motor</option>
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
                                    inputField = 'Fuel_Type: <input type="text" name="Fuel_Type" required>';
                                    inputField2 = 'Trunk_Size: <input type="text" name="Trunk_Size" required>';
                                } else if (selectedVehicle == 'Motorcycle') {
                                    inputField = 'Baggage_Size: <input type="text" name="Baggage_Size" required>';
                                    inputField2 = 'Gasoline_Capacity: <input type="text" name="Gasoline_Capacity" required>';
                                } else if (selectedVehicle == 'Truck') {
                                    inputField = 'Number_Wheels: <input type="text" id="jumlahBan" name="Number_Wheels" required>';
                                    inputField2 = 'Cargo_Size: <input type="text" name="Cargo_Size" required>';
                                }
                        
                                $('#dynamicInput').html(inputField);
                                $('#dynamicInput2').html(inputField2);
                            });
                        });
                    </script>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add vehicle</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
