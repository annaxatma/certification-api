@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Vehicle Order</h1>
    </div>

    <div class="text-right">
        <a class="btn btn-success pull-right" href="{{ route('vehicle_order.create') }}">
            <i class="fas fa-arrow-alt-circle-right"></i> Create Order</a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order_Id</th>
                <th scope="col">Vehicle_Id</th>
                <th scope="col">Total_Price</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1 @endphp
            @foreach ($vehicle_order as $vehicle_orders)
                <tr>
                    @php $index++ @endphp
                    <td>{{ $vehicle_orders['Order_id'] }}</td>
                    <td>{{ $vehicle_orders['Vehicle_Id'] }}</td>
                    <td>{{ $vehicle_orders->vehicle->Price}}</td>
                    <td class="text-center">
                        <form action="{{ route('vehicle_order.destroy',$vehicle_orders) }}" method="POST">   
                        <a class="btn btn-primary" href="{{ route('vehicle_order.edit', $vehicle_orders) }}">Edit</a>
                        @csrf
                        @method('DELETE')      
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection