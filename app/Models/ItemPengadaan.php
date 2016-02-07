<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPengadaan extends Model
{
    protected $table = 'item_pengadaan';

    public $timestamps = false;

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'pengadaan_id');
    }

    public function atk()
    {
        return $this->belongsTo(Atk::class, 'atk_id');
    }
}