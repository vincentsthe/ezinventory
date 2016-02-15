@extends('layouts.base')

@section('content')
    <h1>Daftar Booking</h1>
    <hr>

    <a class="btn btn-success" href="{{ url('booking/add') }}">Tambah Booking baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Tanggal</th>
                <th>Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->nama }}</td>
                    <td>{{ $booking->tanggal }}</td>
                    <td>{{ $booking->itemString() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection