<?php

namespace App\Services;

use App\Models\Atk;

class AtkService
{
    public function save($jenis)
    {
        $atk = new Atk();
        $atk->jenis = $jenis;
        $atk->save();
    }
}