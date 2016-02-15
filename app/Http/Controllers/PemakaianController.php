<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Pemakaian;
use App\Models\User;
use App\Services\PemakaianService;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    private $pemakaianService;

    public function __construct()
    {
        $this->pemakaianService = new PemakaianService();
    }

    public function index()
    {
        $pemakaians = Pemakaian::where('booking', '=', 0)->get();

        return view('pemakaian.index', [
            'pemakaians' => $pemakaians
        ]);
    }

    public function add()
    {
        $userList = User::all();
        $atkList = Atk::all();

        return view('pemakaian.add', [
            'userList' => $userList,
            'atkList' => $atkList
        ]);
    }

    public function postAdd(Request $request)
    {
        $userId = $request->input('user_id');
        $atkIds = $request->input('atk_id');
        $jumlahItems = $request->input('jumlah_item');
        $description = $request->input("description");

        $records = [];
        $recordLength = sizeof($atkIds);
        for ($i = 0; $i < $recordLength; $i++) {
            $records[] = [
                'atk_id' => $atkIds[$i],
                'jumlah' => $jumlahItems[$i]
            ];
        }

        $this->pemakaianService->create($userId, $description, $records);

        return redirect()->action('PemakaianController@index');
    }
}