<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rescue;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RescuedPerson extends Model
{
    /** @use HasFactory<\Database\Factories\RescuedPersonFactory> */
    use HasFactory;

    public function rescue(){
        return $this->hasOne(Rescue::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
