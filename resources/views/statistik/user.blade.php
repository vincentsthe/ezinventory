@extends('layouts.base')

@section('content')
    <h3>Stok Per User</h3>
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
        
    </form>

    @foreach($allUserAtk as $user)
    {{$user[0]->nama}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user[1] as $atk)
                <tr>
                    <td>{{ $atk->id }}</td>
                    <td>{{ $atk->jenis }}</td>
                    <td>{{ $atk->stokCount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik-index.js') }}"></script>
@endsection