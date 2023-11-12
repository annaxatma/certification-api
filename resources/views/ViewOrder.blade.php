@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Detail Customer</h1>
            <p><b>Nama: </b>{{ $order->Name }}</p>
            <p><b>Alamat: </b>{{ $order->Address }}</p>
            <p><b>No_Telepon: </b>{{ $order->Phone }}</p>
            <p><b>ID_Card: </b>{{ $order->Id_Card }}</p>

            {{-- <h1>Detail Order</h1>
            
            @foreach ($orders as $item)
                <p><b>Id : </b>{{ $item->Order_ID }}</p>
                <p><b>Customer_ID : </b>{{ $item->Customer_ID }}</p>
                <p><b>Kendaraan_ID : </b>{{ $item->Kendaraan_ID }}</p>
                <hr>
            @endforeach

            <h1>Detail Mobil</h1>
            @foreach ($kendaraan as $item)
                @if ($item->Jenis_Kendaraan == "Mobil")

                    <p><b>Model: </b>{{ $item->Model }}</p>
                    <p><b>Tahun: </b>{{ $item->Tahun }}</p>
                    <p><b>Jumlah_Penumpang: </b>{{ $item->Jumlah_Penumpang }}</p>
                    <p><b>Manufaktur: </b>{{ $item->Manufaktur }}</p>
                    <p><b>Harga: </b>{{ $item->Harga }}</p>
                    <p><b>Jenis_Kendaraan: </b>{{ $item->Jenis_Kendaraan }}</p>
                    <p><b>Tipe_Bahan_Bakar: </b>{{ $item->mobil->Tipe_Bahan_Bakar }}</p>
                    <p><b>Luas_Bagasi: </b>{{ $item->mobil->Luas_Bagasi }}</p>
                    <hr>
                @elseif ($item->Jenis_Kendaraan = "Truk")

                    <p><b>Model: </b>{{ $item->Model }}</p>
                    <p><b>Tahun: </b>{{ $item->Tahun }}</p>
                    <p><b>Jumlah_Penumpang: </b>{{ $item->Jumlah_Penumpang }}</p>
                    <p><b>Manufaktur: </b>{{ $item->Manufaktur }}</p>
                    <p><b>Harga: </b>{{ $item->Harga }}</p>
                    <p><b>Jenis_Kendaraan: </b>{{ $item->Jenis_Kendaraan }}</p>
                    <p><b>Jumlah_Roda_Ban: </b>{{ $item->truck->Jumlah_Roda_Ban }}</p>
                    <p><b>Luas_Area_Kargo: </b>{{ $item->truck->Luas_Area_Kargo }}</p>
                    <hr>
                @elseif ($item->Jenis_Kendaraan = "Motor")

                    <p><b>Model: </b>{{ $item->Model }}</p>
                    <p><b>Tahun: </b>{{ $item->Tahun }}</p>
                    <p><b>Jumlah_Penumpang: </b>{{ $item->Jumlah_Penumpang }}</p>
                    <p><b>Manufaktur: </b>{{ $item->Manufaktur }}</p>
                    <p><b>Harga: </b>{{ $item->Harga }}</p>
                    <p><b>Jenis_Kendaraan: </b>{{ $item->Jenis_Kendaraan }}</p>
                    <p><b>Ukuran_Bagasi: </b>{{ $item->motor->Ukuran_Bagasi }}</p>
                    <p><b>Kapasitas_Bensin: </b>{{ $item->motor->Kapasitas_Bensin }}</p>
                    <hr>
                @endif
            @endforeach
            <h1>Total Harga = </b>{{ $totalHarga }}</h1> --}}
        </div>
    </div>
@endsection
