<?php

namespace App\Services;

use App\Models\Atk;
use App\Models\ItemPemakaian;
use App\Models\ItemPengadaan;

class AtkService
{
    public function save($jenis)
    {
        $atk = new Atk();
        $atk->jenis = $jenis;
        $atk->save();
    }

    public function getItemCount(Atk $atk)
    {
        $allPengadaan = ItemPengadaan::where('atk_id', $atk->id)->get();

        $itemCount = 0;
        foreach ($allPengadaan as $pengadaan) {
            $itemCount += $pengadaan->jumlah;
        }

        $allPemakaian = ItemPemakaian::join('pemakaian', 'pemakaian.id', '=', 'item_pemakaian.pemakaian_id')
                                        ->where('item_pemakaian.atk_id', '=', $atk->id)
                                        ->where('pemakaian.booking', '=', '0')
                                        ->get();
        foreach ($allPemakaian as $pemakaian) {
            $itemCount -= $pemakaian->jumlah;
        }

        return $itemCount;
    }
}