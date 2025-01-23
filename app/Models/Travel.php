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

    protected $guarded = ['id'];

    // Travel <--> Doctor
    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function rescue(){
        return $this->hasMany(Rescue::class);
    }

    // Travel <--> CrewMember
    public function kapitaina(){
        return $this->belongsTo(CrewMember::class, 'kapitaina_id');
    }

    public function makinen_arduraduna(){
        return $this->belongsTo(CrewMember::class, 'makinen_arduraduna_id');
    }

    public function mekanikoa(){
        return $this->belongsTo(CrewMember::class, 'mekanikoa_id');
    }

    public function zubiko_ofiziala(){
        return $this->belongsTo(CrewMember::class, 'zubiko_ofiziala_id');
    }

    public function marinela_1(){
        return $this->belongsTo(CrewMember::class, 'marinela_1_id');
    }

    public function marinela_2(){
        return $this->belongsTo(CrewMember::class, 'marinela_2_id');
    }

    public function marinela_3(){
        return $this->belongsTo(CrewMember::class, 'marinela_3_id');
    }

    public function erizaina(){
        return $this->belongsTo(CrewMember::class, 'erizaina_id');
    }
}
