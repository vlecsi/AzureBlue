<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cititor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    

    protected $hidden = ['updated_at','created_at','deleted_at'];

}
