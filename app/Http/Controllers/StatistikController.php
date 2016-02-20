<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use App\Models\Atk;
use App\Models\User;
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
    	$countAtk = sizeof($atkList);
        $countPemakaian = array();

    	for($i = 0;$i < $countAtk;$i++) {
    		$countPemakaian[] = $this->statistikService->getPemakaianAtk($atkList[$i]->id, $startdate, $enddate);
    	}
    	
        return view('statistik.atk', [
            'countPemakaian' => $countPemakaian,
            'atkList' => $atkList,
            'startDate' => $startdate,
            'endDate' => $enddate,
            'countAtk' => $countAtk
        ]);
    }

    public function showMinAtk(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $allAtk = Atk::all();

        foreach ($allAtk as $atk) {
            $atk['stokCount'] = $this->statistikService->getStokMinimumAtk($atk,$startdate,$enddate);
        }
        
        return view('statistik.stokminimum', [
            'stokList' => $allAtk,
            'startDate' => $startdate,
            'endDate' => $enddate
        ]);
    }

    public function showUser(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $allAtk = Atk::all();
        $allUser = User::all();
        $allUserAtk = [];

        foreach($allUser as $user){
            $atkList = [];
            foreach ($allAtk as $atk) {
                $atkTemp = clone $atk;
                $atkTemp['stokCount'] = $this->statistikService->getAtkPerUser($atk,$startdate,$enddate, $user->id);
                $atkList[] = $atkTemp;
            }
            $allUserAtk[] = [$user, $atkList];
        }

        return view('statistik.user', [
            'allUserAtk' => $allUserAtk,
            'startDate' => $startdate,
            'endDate' => $enddate
        ]);   
    }


}