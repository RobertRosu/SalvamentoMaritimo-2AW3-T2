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

    protected $fillable = [
        'name',
        'email',
        'rol',
        'start_date',
        'status',
        'stop_date',
        'reason'
    ];

    protected $guarded = ['id'];

    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    public function travel(){
        return $this->hasMany(Travel::class);
    }

    public function rescued_people(){
        return $this->hasMany(RescuedPerson::class);
    }
}
