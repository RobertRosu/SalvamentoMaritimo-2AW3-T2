<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;
use App\Models\RescuedPerson;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongstTo;



class Rescue extends Model
{

    protected $fillable = [
        "travel_id",
        "numero_rescatados",
        "start_time",
        "end_time"
    ];

    protected $guarded = [
        "id"
    ];

    /** @use HasFactory<\Database\Factories\RescueFactory> */
    use HasFactory;

    public function travel(){
        return $this->belongsTo(Travel::class);
    }

    public function rescued_persons(){
        return $this->hasMany(RescuedPerson::class);
    }
}
