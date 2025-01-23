<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongstTo;

class CrewMember extends Model
{

    protected $fillable = ['name', 'email', 'start_date', 'stop_date', 'status', 'reason', 'rol'];
    protected $guarded = ['id'];

    /** @use HasFactory<\Database\Factories\CrewMemberFactory> */
    use HasFactory;

    public function travel(){
        return $this->hasMany(Travel::class);
    }
}
