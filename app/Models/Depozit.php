<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depozit extends Model
{
    use HasFactory;

    public function Carte()
    {
        return $this->belongsTo(Carte::class);
    }
}
