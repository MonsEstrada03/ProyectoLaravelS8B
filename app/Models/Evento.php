<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'paquete_id',
        'fecha',
        'hora_inicio',
        'hora_final',
        'proposito',
        'invitados',
        'confirmado',
        'realizado'
    ];
}
