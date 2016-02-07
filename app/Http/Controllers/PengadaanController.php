<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Pengadaan;
use App\Models\Supplier;
use App\Services\PengadaanService;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    private $pengadaanService;

    public function __construct()
    {
        $this->pengadaanService = new PengadaanService();
    }

    public function index()
    {
        $pengadaans = Pengadaan::all();

        return view('pengadaan.index', [
            'pengadaans' => $pengadaans
        ]);
    }

    public function add()
    {
        $supplierList = Supplier::all();
        $atkList = Atk::all();

        return view('pengadaan.add', [
            'supplierList' => $supplierList,
            'atkList' => $atkList
        ]);
    }
    public function postAdd(Request $request)
    {
        $supplierId = $request->input('supplier_id');
        $atkIds = $request->input('atk_id');
        $jumlahItems = $request->input('jumlah_item');

        $records = [];
        $recordLength = sizeof($atkIds);
        for ($i = 0; $i < $recordLength; $i++) {
            $records[] = [
                'atk_id' => $atkIds[$i],
                'jumlah' => $jumlahItems[$i]
            ];
        }

        $this->pengadaanService->create($supplierId, $records);

        return redirect()->action('PengadaanController@index');
    }
}