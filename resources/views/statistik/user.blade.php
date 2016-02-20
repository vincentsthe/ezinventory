@extends('layouts.base')

@section('content')
    <h3>Pemakaian Per User</h3>
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
    <br><br><br>
    @foreach($allUserAtk as $user)
    <h4>{{$user[0]->nama}}</h4>
    <hr>
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
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik.js') }}"></script>
@endsection