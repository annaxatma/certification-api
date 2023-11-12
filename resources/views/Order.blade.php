@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Order</h1>
    </div>

    <div class="text-right">
        <a class="btn btn-success pull-right" href="{{ route('order.create') }}">
            <i class="fas fa-arrow-alt-circle-right"></i> Create New Order</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Id_Card</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1 @endphp
            @foreach ($order as $orders)
                <tr>
                    @php $index++ @endphp
                    <td>{{ $orders['Name'] }}</td>
                    <td>{{ $orders['Address'] }}</td>
                    <td>{{ $orders['Phone'] }}</td>
                    <td>{{ $orders['Id_Card'] }}</td>
                    <td class="text-center">
                        <form action="{{ route('order.destroy',$orders->Order_id) }}" method="POST">   
                            <a class="btn btn-info" href="{{ route('order.show', $orders->Order_id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('order.edit', $orders->Order_id) }}">Edit</a>
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