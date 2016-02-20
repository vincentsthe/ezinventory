@extends('layouts.base')

@section('content')
    <h1>Daftar Pengadaan</h1>
    <hr>

    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="{{ url('pengadaan/add') }}">Tambah Pengadaan baru</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Supllier</th>
                <th>Tanggal</th>
                <th>Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengadaans as $pengadaan)
                <tr>
                    <td>{{ $pengadaan->id }}</td>
                    <td>{{ $pengadaan->supplier->nama }}</td>
                    <td>{{ $pengadaan->tanggal }}</td>
                    <td>{{ $pengadaan->itemString() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection