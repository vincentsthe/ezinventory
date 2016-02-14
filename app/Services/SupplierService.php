<?php

namespace App\Services;

use App\Models\Supplier;

class SupplierService
{
    public function save($nama)
    {
        $atk = new Supplier();
        $atk->nama = $nama;
        $atk->save();
    }
}