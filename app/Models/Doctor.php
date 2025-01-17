<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;
use App\Models\RescuedPerson;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongstTo;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    public function travel(){
        return $this->belongsTo(Travel::class);
    }

    public function rescued_people(){
        return $this->hasMany(RescuedPerson::class);
    }
}
