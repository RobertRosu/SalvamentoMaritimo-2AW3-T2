<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    /** @use HasFactory<\Database\Factories\TravelFactory> */
    use HasFactory;

    protected $fillable = [
        'origen',
        'destino',
        'doctor_id',
        'kapitaina_id',
        'makinen_arduraduna_id',
        'mekanikoa_id',
        'zubiko_ofiziala_id',
        'marinela_1_id',
        'marinela_2_id',
        'marinela_3_id',
        'erizaina_id'
    ];
}
