@extends('layouts.base')

@section('content')
    <h1>Daftar supplier</h1>
    <hr>

    <a class="btn btn-success" href="{{ url('supplier/add') }}">Tambah supplier baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplierList as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->nama }}</td>
                    <td>0</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection