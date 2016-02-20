@extends('layouts.base')

@section('content')
    <h1>Daftar Pemakaian</h1>
    <hr>

    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="{{ url('pemakaian/add') }}">Tambah Pemakaian baru</a>
    </div>

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
                    <td><a href="/pemakaian/view/{{ $pemakaian->id }}"><span class="glyphicon glyphicon-search"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection