<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
    use HasFactory;
}
