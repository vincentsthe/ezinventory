@extends('layouts.base')

@section('content')
    <h1>
        Tambah Pengadaan Baru
    </h1>
    <hr>

    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">Supplier</label>
            <div class="col-md-5">
                <select class="form-control" name="supplier_id" required>
                    @foreach($supplierList as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h2>Item</h2>
        <table class="table" id="pengadaan-table">
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
        <button id="add-item-button" type="button" class="btn btn-success">Tambah Item</button>

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
    <script type="text/javascript" src="{{ URL::asset('assets/js/pengadaan-add.js') }}"></script>
@endsection