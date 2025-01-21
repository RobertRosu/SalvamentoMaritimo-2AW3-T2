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
    /** @use HasFactory<\Database\Factories\CrewMemberFactory> */
    use HasFactory;

    public function travel(){
        return $this->hasMany(Travel::class);
    }
}
