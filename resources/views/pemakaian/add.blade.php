@extends('layouts.base')

@section('content')
    <h1>
        Tambah Pemakaian Baru
    </h1>
    <hr>

    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">User</label>
            <div class="col-md-5">
                <select class="form-control" name="user_id" required>
                    @foreach($userList as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h2>Item</h2>
        <table class="table" id="pemakaian-table">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr class='item-row'>
                    <td><select id="option1" class='form-control' name='atk_id[]'> </select></td> 
                    <td><input type='number' name='jumlah_item[]' class='form-control' required></td> 
                    <td><a class='remove-button'><span class='glyphicon glyphicon-remove'></span></a></td> 
                </tr>
            </tbody>
        </table>
        <button id="add-item-button" type="button" class="btn btn-success">Tambah Item</button><br>

        <textarea class="form-control" style="margin-top:10px" name="description"></textarea><br>

        <div class="col-md-10 col-md-offset-2">
            <button class="btn btn-primary" style="float:right" type="submit">Tambah</button>
        </div>
    </form>
@endsection

@section('javascript')
    <script type="text/javascript">
        window.atkList = [];
        @foreach($atkList as $atk)
            window.atkList.push({
                "id": {{ $atk->id }},
                "jenis": "{{ $atk->jenis }}"
            });
        @endforeach
        console.log(window.atkList);

        var atkOptionString = "";
        for (var i = 0; i < window.atkList.length; i++) {
            atkOptionString += "<option value='" + window.atkList[i].id + "'>" + window.atkList[i].jenis + "</option>";
        }

        $("#option1").append($(atkOptionString));
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/pemakaian-add.js') }}"></script>
@endsection