@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>update vehicle Order</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('vehicle_order.update', $vehicle_order->Vehicleorder_id) }}" method="post">
                    @method("PUT")
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Order : </label>
                        <select name="Order_id" class="custom-select">
                            @foreach ($order as $orders)
                                <option value="{{$orders['Order_id']}}">{{ $orders['Name'] }}</option>                               
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Vehicle : </label>
                        <select name="Vehicle_Id" class="custom-select">
                            @foreach ($vehicle as $vehicles)
                                    <option value="{{$vehicles['Vehicle_Id']}}">{{ $vehicles['Model'] }}</option>                               
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
