@extends('layouts.base')

@section('content')
    <h1>
        Statistik
    </h1>
    <hr>

    <form name="statsForm" class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Mulai</label>
            <div class="col-md-5">
                <input id="startdate" type="text" class="form-control" name="startdate" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Selesai</label>
            <div class="col-md-5">
                <input id="enddate" type="text" class="form-control" name="enddate" required>
            </div>
        </div>

        <br><br>
        <div class="col-md-4">
            <button id="add-item-button" type="submit" onclick="submitUser(); return false" class="btn btn-primary btn-lg">ATK per User</button>
        </div>
        <div class="col-md-4">
            <button id="add-item-button" type="submit" onclick="submitAtk(); return false" class="btn btn-primary btn-lg">ATK per Periode</button>
        </div>
        <div class="col-md-4">
            <button id="add-item-button" type="submit" onclick="submitMinAtk(); return false" class="btn btn-primary btn-lg">Stok Minimum ATK</button>
        </div>

    

    </form>

    <div id="chart">
    </div>
@endsection

@section('javascript')
    
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik.js') }}"></script>
    <script type="text/javascript">
        function checkDateFilled() {
            if ($("#startdate").val() && $("#enddate").val()) {
                return true;
            } else {
                alert("isi tanggal mulai dan tanggal selesai");
                return false;
            }
        }

        function submitAtk()
        {
            if(checkDateFilled()) {
                var form = document.forms['statsForm'];
                form.action = '/statistik/atk';
                var el = document.createElement("input");
                el.type = "hidden";
                el.name = "myHiddenField";
                el.value = "myValue";
                form.appendChild(el);
                form.submit();
            }
        }

        function submitUser()
        {
            if(checkDateFilled()) {
                var form = document.forms['statsForm'];
                form.action = '/statistik/user';
                var el = document.createElement("input");
                el.type = "hidden";
                el.name = "myHiddenField";
                el.value = "myValue";
                form.appendChild(el);
                form.submit();
            }
        }

        function submitMinAtk()
        {
            if(checkDateFilled()) {
                var form = document.forms['statsForm'];
                form.action = '/statistik/min-atk';
                var el = document.createElement("input");
                el.type = "hidden";
                el.name = "myHiddenField";
                el.value = "myValue";
                form.appendChild(el);
                form.submit();
            }
        }
    </script>
@endsection