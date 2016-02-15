<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $table = 'pemakaian';

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(ItemPemakaian::class, 'pemakaian_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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