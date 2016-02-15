@extends('layouts.base')

@section('content')
    <h1>Daftar Pemakaian</h1>
    <hr>

    <a class="btn btn-success" href="{{ url('pemakaian/add') }}">Tambah Pemakaian baru</a>

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
            @foreach($pemakaians as $pemakaian)
                <tr>
                    <td>{{ $pemakaian->id }}</td>
                    <td>{{ $pemakaian->user->nama }}</td>
                    <td>{{ $pemakaian->tanggal_pemakaian }}</td>
                    <td>{{ $pemakaian->itemString() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection