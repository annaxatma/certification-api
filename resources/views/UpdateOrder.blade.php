@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Edit order</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('order.update', $order->Order_id) }}" method="post">
                    {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Nama : </label>
                        <input type="text" class="form-control" name="Name" value="{{ $order->Name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat : </label>
                        <input type="text" class="form-control" name="Address" value="{{ $order->Address }}"required>
                    </div>
                    <div class="form-group">
                        <label>No_Telepon : </label>
                        <input type="number" class="form-control" name="Phone" value="{{ $order->Phone }}"required>
                    </div>
                    <div class="form-group">
                        <label>ID_Card : </label>
                        <input type="text" class="form-control" name="Id_Card" value="{{ $order->Id_Card }}" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Edit Order</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
