@extends('layouts.base')

@section('content')
    <h1>Daftar Atk</h1>
    <hr>

    <a class="btn btn-success" href="{{ url('atk/add') }}">Tambah Jenis ATK baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atkList as $atk)
                <tr>
                    <td>{{ $atk->id }}</td>
                    <td>{{ $atk->jenis }}</td>
                    <td>0</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection