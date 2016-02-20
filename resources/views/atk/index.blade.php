@extends('layouts.base')

@section('content')
    <h1>Daftar Atk</h1>
    <hr>

    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="{{ url('atk/add') }}">Tambah Jenis ATK baru</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atkList as $atk)
                <tr>
                    <td>{{ $atk->id }}</td>
                    <td>{{ $atk->jenis }}</td>
                    <td>{{ $atk->itemCount }}</td>
                    <td>{{ $atk->satuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection