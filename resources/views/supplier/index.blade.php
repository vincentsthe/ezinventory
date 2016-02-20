@extends('layouts.base')

@section('content')
    <h1>Daftar supplier</h1>
    <hr>

    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="{{ url('supplier/add') }}">Tambah supplier baru</a>
    </div>

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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection