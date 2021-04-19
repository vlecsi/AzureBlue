<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carte extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Depozits()
    {
        return $this->hasMany(Depozit::class);
    }

    protected $softDelete = true;
    protected $hidden = ['updated_at','created_at','deleted_at'];
}
