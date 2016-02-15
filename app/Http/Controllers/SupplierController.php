<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use App\Services\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $supplierService;

    public function __construct()
    {
        $this->supplierService = new SupplierService();
    }

    public function index()
    {
        $allSupplier = Supplier::all();

        return view('supplier.index', [
            'supplierList' => $allSupplier
        ]);
    }

    public function add()
    {
        return view('supplier.add');
    }

    public function postAdd(Request $request)
    {
        $nama = $request->input('nama');
        $this->supplierService->save($nama);

        return redirect()->action('SupplierController@index');
    }
}