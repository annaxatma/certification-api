@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Add new vehicle Order</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('vehicle_order.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Vehicle : </label>
                        <select name="Vehicle_Id" class="custom-select">
                            @foreach ($vehicle as $vehicles)
                                    <option value="{{$vehicles['Vehicle_Id']}}">{{ $vehicles['Model'] }}</option>                               
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Order : </label>
                        <select name="Order_id" class="custom-select">
                            @foreach ($vehicle_order as $vehicle_orders)
                                <option value="{{$vehicle_orders['Order_id']}}">{{ $vehicle_orders['Name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add Order</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
