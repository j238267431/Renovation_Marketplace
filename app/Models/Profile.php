<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birthday',
        'avatar',
        'country_id',
        'city_id',
        'address',
    ];

    public function country(): hasOne
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->diffInYears();
    }
}
