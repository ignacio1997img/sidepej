<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $connection = 'siscor_v2';
    protected $table = 'archivos';

    protected $fillable = [
        'ruta',
        'descripcion',
        'nombre_origen',
        'extension',
        'entrada_id',
        'user_id',
        'created_at',
        'deleted_at',
        'nci',
        'deleteUser_id'
    ];

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
