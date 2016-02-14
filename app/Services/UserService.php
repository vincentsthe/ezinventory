<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function save($nama)
    {
        $atk = new User();
        $atk->nama = $nama;
        $atk->save();
    }
}