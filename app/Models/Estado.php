<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $connection = 'siscor_v2';
    protected $table = 'estados';

    protected $fillable = [
        'key',
        'nombre',
        'estado',
        'color',
        'created_at',
        'deleted_at'
    ];
}
