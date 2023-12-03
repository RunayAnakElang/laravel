<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function questions()
    {
        return $this->hasMany(question::class, 'id_kategori');
    }
    use HasFactory;
}
