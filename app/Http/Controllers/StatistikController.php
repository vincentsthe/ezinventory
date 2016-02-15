<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use App\Models\Atk;
use Carbon\Carbon;
use App\Services\StatistikService;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    private $statistikService;

    public function __construct()
    {
        $this->statistikService = new StatistikService();
    }

    public function index()
    {
    	return view('statistik.index');
    }

    public function showAtk(Request $request)
    {
    	$startdate = $request->input('startdate');
    	$enddate = $request->input('enddate');
    	$atkList = Atk::all();
    	$countAtk = $atkList->count();
        $countPemakaian = array();

    	for($i = 1;$i <= $countAtk;$i++) {
    		$countPemakaian = $this->statistikService->getPemakaianAtk($i, $startdate, $enddate);
    	}
    	
        return view('statistik.atk', [
            'countPemakaian' => $countPemakaian,
            'atkList' => $atkList,
            'countAtk' => $countAtk
        ]);
    }

    public function showUser(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        
    }

    public function showMinAtk(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
    }

}