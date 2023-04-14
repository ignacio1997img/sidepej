<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrada_id',
        'name',
        'phone',
        'applicant',
        'province_id',
        'municipality',
        'start',
        'finish',
        'receiptNumber',
        'amount',
        'status',
        'description',
        'registerUser_id',
        'deleted_at',
        'deletedUser_id'
    ];
    
}
