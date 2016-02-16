<?php

namespace App\Services;

use App\Models\Atk;
use App\Models\ItemPemakaian;
use App\Models\Pemakaian;
use Carbon\Carbon;

class PemakaianService
{
    public function create($userId, $description, array $pemakaianRecords)
    {
        $pemakaian = new Pemakaian();
        $pemakaian->user_id = $userId;
        $pemakaian->tanggal_pemakaian = new Carbon();
        $pemakaian->deskripsi = $description;
        $pemakaian->booking = 0;
        $pemakaian->save();
    
        foreach ($pemakaianRecords as $pemakaianRecord)
        {
            $pemakaianItem = new ItemPemakaian();
            $pemakaianItem->atk_id = $pemakaianRecord['atk_id'];
            $pemakaianItem->jumlah = $pemakaianRecord['jumlah'];
            $pemakaianItem->pemakaian_id = $pemakaian->id;

            $pemakaianItem->save();
        }
    }

    public function haveSufficientItem(array $pemakaianRecords)
    {
        $atkService = new AtkService();

        foreach ($pemakaianRecords as $pemakaianRecord) {
            $atk = Atk::find($pemakaianRecord['atk_id']);
            $itemAvailable = $atkService->getItemCount($atk);
            if ($itemAvailable < $pemakaianRecord['jumlah']) {
                return false;
            }
        }

        return true;
    }
}