@extends('layouts.base')

@section('content')
    <h1>Booking #{{ $booking->id }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-3"><b>Pemakai</b></div>
        <div class="col-md-9">{{ $booking->user->nama }}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-3"><b>Tanggal Booking</b></div>
        <div class="col-md-9">{{ $booking->tanggal_booking }}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-3"><b>Tanggal Pemakaian</b></div>
        <div class="col-md-9">{{ $booking->tanggal_pemakaian }}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <div><b>Barang</b></div>
            <ul>
                @foreach($booking->items as $item)
                    <li>{{ $item->jumlah }} {{ $item->atk->jenis }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-md-3"><b>Deskripsi</b></div>
        <div class="col-md-9">{{ $booking->deskripsi }}</div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-warning" href="/booking/confirm/{{ $booking->id }}">Konfirm Pengambilan</a>
            <a class="btn btn-danger" href="/booking/delete/{{ $booking->id }}" onclick="return confirm('ingin menghapus booking ini?');">Hapus Booking</a>
        </div>
    </div>
@endsection