<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameReservation_id',
        'solicitud',
        'carnet',
        'deposito',
        'poder',
        'deleted_at',
        'registerUser'
        
    ];
}
