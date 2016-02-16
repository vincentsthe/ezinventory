<?php

namespace App\Services;

use App\Models\ItemPemakaian;
use App\Models\Pemakaian;
use Carbon\Carbon;

class BookingService
{
    public function create($userId, $tanggalPemakaian, $description, array $pemakaianRecords)
    {
        $pemakaian = new Pemakaian();
        $pemakaian->user_id = $userId;
        $pemakaian->tanggal_booking = new Carbon();
        $pemakaian->deskripsi = $description;
        $pemakaian->tanggal_pemakaian = Carbon::createFromFormat("Y-m-d", $tanggalPemakaian);
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

    public function confirmBooking($id)
    {
        $booking = Pemakaian::where('booking', '=', 1)
                            ->where('id', '=', $id)
                            ->first();

        $booking->tanggal_pemakaian = new Carbon();
        $booking->booking = 0;
        $booking->save();
    }
}