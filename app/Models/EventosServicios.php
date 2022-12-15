<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosServicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventos_id',
        'servicio_id',
        'costo'
    ];
}
