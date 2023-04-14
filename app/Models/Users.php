<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $connection = 'siscor_v2';
    protected $table = 'users';


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'deleted_at'
    ];
}
