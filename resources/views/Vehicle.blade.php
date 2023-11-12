@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Car</h1>
    </div>

    <div class="text-right">
        <a class="btn btn-success pull-right" href="{{ route('vehicle.create') }}">
            <i class="fas fa-arrow-alt-circle-right"></i> Create new Vehicle</a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Total_Passenger</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Price</th>
                <th scope="col">Vehicle_Type</th>
                <th scope="col">Fuel_Type</th>
                <th scope="col">Trunk_Size</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1 @endphp
            @foreach ($vehicle as $vehicles)
                <tr>
                    @php $index++ @endphp
                    
                    @if ($vehicles->car)
                        <td>{{ $vehicles['Model'] }}</td>
                        <td>{{ $vehicles['Year'] }}</td>
                        <td>{{ $vehicles['Total_Passenger'] }}</td>
                        <td>{{ $vehicles['Manufacturer'] }}</td>
                        <td>{{ $vehicles['Price'] }}</td>
                        <td>{{ $vehicles['Vehicle_Type'] }}</td>
                        <td>{{ $vehicles->car->Fuel_Type }}</td>
                        <td>{{ $vehicles->car->Trunk_Size }}</td>

                        <td class="text-center">
                            <form action="{{ route('vehicle.destroy',$vehicles->id) }}" method="POST">   
                            <a class="btn btn-info" href="{{ route('vehicle.show', $vehicles->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('vehicle.edit', $vehicles->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')      
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endif


                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        <h1>Motorcycle</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Total_Passenger</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Price</th>
                    <th scope="col">Vehicle_Type</th>
                    <th scope="col">Baggage_Size</th>
                    <th scope="col">Gasoline_Capacity</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @foreach ($vehicle as $vehicles)
                    <tr>
                        @php $index++ @endphp
                        
                        @if ($vehicles->motor)
                        <td>{{ $vehicles['Model'] }}</td>
                        <td>{{ $vehicles['Year'] }}</td>
                        <td>{{ $vehicles['Total_Passenger'] }}</td>
                        <td>{{ $vehicles['Manufacturer'] }}</td>
                        <td>{{ $vehicles['Price'] }}</td>
                        <td>{{ $vehicles['Vehicle_Type'] }}</td>
                            <td>{{ $vehicles->motorcycle->Baggage_Size }}</td>
                            <td>{{ $vehicles->motorcycle->Gasoline_Capacity }}</td>
    
                            <td class="text-center">
                                <form action="{{ route('vehicle.destroy',$vehicles->id) }}" method="POST">   
                                <a class="btn btn-info" href="{{ route('vehicle.show', $vehicles->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('vehicle.edit', $vehicles->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center">
        <h1>Truck</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Total_Passenger</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Price</th>
                    <th scope="col">Vehicle_Type</th>
                    <th scope="col">Number_Wheels</th>
                    <th scope="col">Cargo_Size</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @foreach ($vehicle as $vehicles)
                    <tr>
                        @php $index++ @endphp
                        
                        @if ($vehicles->truck)
                        <td>{{ $vehicles['Model'] }}</td>
                        <td>{{ $vehicles['Year'] }}</td>
                        <td>{{ $vehicles['Total_Passenger'] }}</td>
                        <td>{{ $vehicles['Manufacturer'] }}</td>
                        <td>{{ $vehicles['Price'] }}</td>
                        <td>{{ $vehicles['Vehicle_Type'] }}</td>
                            <td>{{ $vehicles->truck->Number_Wheels }}</td>
                            <td>{{ $vehicles->truck->Cargo_Size }}</td>
    
                            <td class="text-center">
                                <form action="{{ route('vehicle.destroy',$vehicles->id) }}" method="POST">   
                                <a class="btn btn-info" href="{{ route('vehicle.show', $vehicles->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('vehicle.edit', $vehicles->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection