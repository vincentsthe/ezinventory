<?php

namespace App\Services;

use App\Models\ItemPemakaian;
use App\Models\Pemakaian;
use Carbon\Carbon;

class BookingService
{
    public function create($userId, $description, array $pemakaianRecords)
    {
       $pemakaian = new Pemakaian();
        $pemakaian->user_id = $userId;
        $pemakaian->tanggal_booking = new Carbon();
        $pemakaian->deskripsi = $description;
        $pemakaian->booking = 1;
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
}