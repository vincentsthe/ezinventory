<?php

namespace App\Services;

use App\Models\ItemPengadaan;
use App\Models\Pengadaan;
use Carbon\Carbon;

class PengadaanService
{
    public function create($supplierId, $tanggalPemakaian, array $pengadaanRecords)
    {
        $pengadaan = new Pengadaan();
        $pengadaan->supplier_id = $supplierId;
        $pengadaan->tanggal = new Carbon();
        $pengadaan->tanggal_pemakaian = Carbon::createFromFormat("Y-m-d", $tanggalPemakaian);
        $pengadaan->save();

        foreach ($pengadaanRecords as $pengadaanRecord)
        {
            $pengadaanItem = new ItemPengadaan();
            $pengadaanItem->atk_id = $pengadaanRecord['atk_id'];
            $pengadaanItem->jumlah = $pengadaanRecord['jumlah'];
            $pengadaanItem->pengadaan_id = $pengadaan->id;

            $pengadaanItem->save();
        }
    }
}