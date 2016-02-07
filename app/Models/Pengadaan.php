<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $table = 'pengadaan';

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(ItemPengadaan::class, 'pengadaan_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function itemString()
    {
        $items = $this->items;

        $stringrray = [];
        foreach ($items as $item) {
            $stringrray[] = $item->jumlah . " " . $item->atk->jenis;
        }

        return implode(", ", $stringrray);
    }
}