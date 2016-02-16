<?php

namespace App\Services;

use App\Models\Statistik;
use App\Models\ItemPemakaian;
use App\Models\Atk;

class StatistikService
{
	public function getPemakaianAtk($atkId, $startDate, $endDate){
		$itemCount = 0;
		$allPemakaian = ItemPemakaian::join('pemakaian', 'pemakaian.id', '=', 'item_pemakaian.pemakaian_id')
                                        ->where('item_pemakaian.atk_id', '=', $atkId)
                                        ->where('pemakaian.booking', '=', '0')
                                        ->where('pemakaian.tanggal_pemakaian', '>=', $startDate)
                                        ->where('pemakaian.tanggal_pemakaian', '<=', $endDate)
                                        ->get();

        foreach ($allPemakaian as $pemakaian) {
            $itemCount += $pemakaian->jumlah;
        }
        
        return $itemCount;
	}

    public function getStokMinimumAtk(Atk $atk, $startDate, $endDate){
        return $this->getPemakaianAtk($atk->id, $startDate, $endDate);
    }

    public function getAtkPerUser(Atk $atk, $startDate, $endDate, $userId){
		$itemCount = 0;
		$allPemakaian = ItemPemakaian::join('pemakaian', 'pemakaian.id', '=', 'item_pemakaian.pemakaian_id')
                                        ->where('item_pemakaian.atk_id', '=', $atk->id)
                                        ->where('pemakaian.booking', '=', '0')
                                        ->where('pemakaian.tanggal_pemakaian', '>=', $startDate)
                                        ->where('pemakaian.tanggal_pemakaian', '<=', $endDate)
                                        ->where('user_id', '=', $userId)
                                        ->get();

        foreach ($allPemakaian as $pemakaian) {
            $itemCount += $pemakaian->jumlah;
        }
        
        return $itemCount;
	}

}

?>
