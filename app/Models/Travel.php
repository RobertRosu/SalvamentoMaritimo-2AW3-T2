<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\CrewMember;
use App\Models\Rescue;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongstTo;

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
        'erizaina_id',
        'description'
    ];

    // Travel <--> Doctor
    public function doctor(){
        return $this->hasOne(Doctor::class, 'doctor_id');
    }

    public function rescue(){
        return $this->belongsTo(Rescue::class);
    }

    // Travel <--> CrewMember
    public function kapitaina(){
        return $this->hasOne(CrewMember::class, 'kapitaina_id');
    }

    public function makinen_arduraduna(){
        return $this->hasOne(CrewMember::class, 'makinen_arduraduna_id');
    }

    public function mekanikoa(){
        return $this->hasOne(CrewMember::class, 'mekanikoa_id');
    }

    public function zubiko_ofiziala(){
        return $this->hasOne(CrewMember::class, 'zubiko_ofiziala_id');
    }

    public function marinela_1(){
        return $this->hasOne(CrewMember::class, 'marinela_1_id');
    }

    public function marinela_2(){
        return $this->hasOne(CrewMember::class, 'marinela_2_id');
    }

    public function marinela_3(){
        return $this->hasOne(CrewMember::class, 'marinela_3_id');
    }

    public function erizaina(){
        return $this->hasOne(CrewMember::class, 'erizaina_id');
    }
}
