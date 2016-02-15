@extends('layouts.base')

@section('content')
    <h1>Daftar peminjam</h1>
    <hr>

    <a class="btn btn-success" href="{{ url('user/add') }}">Tambah peminjam baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection