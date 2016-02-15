@extends('layouts.base')

@section('content')
    <h1>
        Tambah user baru
    </h1>
    <hr>

    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">Nama</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <div class="col-md-10 col-md-offset-2">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
@endsection