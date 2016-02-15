<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPemakaian extends Model
{
    protected $table = 'item_pemakaian';

    public $timestamps = false;

    public function pemakaian()
    {
        return $this->belongsTo(Pemakaian::class, 'pemakaian_id');
    }

    public function atk()
    {
        return $this->belongsTo(Atk::class, 'atk_id');
    }
}