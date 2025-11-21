<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    Use SoftDeletes;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion'
    ];
}