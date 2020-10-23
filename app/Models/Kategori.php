<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}

