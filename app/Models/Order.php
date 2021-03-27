<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'company_id',
        'status_id',
        'details',
    ];

    public function customer(): HasOne
    {
        return $this->hasOne(User::class, 'customer_id');
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class);
    }
}
