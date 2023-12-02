<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function question()
    {
        return $this->hasMany(Question::class);
    }
    use HasFactory;
}
