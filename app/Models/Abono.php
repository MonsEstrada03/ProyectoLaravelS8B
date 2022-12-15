<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;
    protected $fillable = [
        'evento_id',
        'usuario_id',
        'paquete_id',
        'monto',
    ];
}
