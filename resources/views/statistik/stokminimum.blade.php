@extends('layouts.base')

@section('content')
    <h3>Stok Minimum</h3>
    <hr>

    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Mulai</label>
            <div class="col-md-5">
                <input id="startdate" type="text" class="form-control" name="startdate" value="{{ $startDate }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Selesai</label>
            <div class="col-md-5">
                <input id="enddate" type="text" class="form-control" name="enddate" value="{{ $endDate }}" required>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-2">
            <button class="btn btn-primary" style="float:right" type="submit">Buka</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokList as $stokatk)
                <tr>
                    <td>{{ $stokatk->id }}</td>
                    <td>{{ $stokatk->jenis }}</td>
                    <td>{{ $stokatk->stokCount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik.js') }}"></script>
@endsection