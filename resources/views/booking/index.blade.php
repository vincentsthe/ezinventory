@extends('layouts.base')

@section('content')
    <h1>Daftar Booking</h1>
    <hr>

    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="{{ url('booking/add') }}">Tambah Booking baru</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Tanggal Pemakaian</th>
                <th>Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->nama }}</td>
                    <td>{{ $booking->tanggal_booking }}</td>
                    <td>{{ $booking->itemString() }}</td>
                    <td><a href="/booking/view/{{ $booking->id }}"><span class="glyphicon glyphicon-search"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection