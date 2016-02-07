<?php

namespace App\Http\Controllers;

use App\Models\Atk;

use App\Services\AtkService;
use Illuminate\Http\Request;

class AtkController extends Controller
{
    private $atkService;

    public function __construct()
    {
        $this->atkService = new AtkService();
    }

    public function index()
    {
        $allAtk = Atk::all();

        return view('atk.index', [
            'atkList' => $allAtk
        ]);
    }

    public function add()
    {
        return view('atk.add');
    }

    public function postAdd(Request $request)
    {
        $jenis = $request->input('jenis');
        $this->atkService->save($jenis);

        return redirect()->action('AtkController@index');
    }
}