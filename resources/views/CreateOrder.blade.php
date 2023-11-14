@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Add new Order</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('order.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" class="form-control" name="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Address : </label>
                        <input type="text" class="form-control" name="Address" required>
                    </div>
                    <div class="form-group">
                        <label>Phone : </label>
                        <input type="number" class="form-control" name="Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Id_Card : </label>
                        <input type="number" class="form-control" name="Id_Card" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add Order</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection