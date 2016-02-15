<?php

namespace App\Services;

use App\Models\Statistik;

class StatistikService
{
	public function getPemakaianAtk($atkId, $startDate, $endDate){
		$itemCount = 0;
		$allPemakaian = ItemPemakaian::join('pemakaian', 'pemakaian.id', '=', 'item_pemakaian.pemakaian_id')
                                        ->where('item_pemakaian.atk_id', '=', $atk->id)
                                        ->where('pemakaian.booking', '=', '0')
                                        ->where('pemakaian.tanggal_pemakaian', '>=', $startDate)
                                        ->where('pemakaian.tanggal_pemakaian', '<=', $endDate)
                                        ->get();
        foreach ($allPemakaian as $pemakaian) {
            $itemCount += $pemakaian->jumlah;
        }

        return $itemCount;
	}	
}