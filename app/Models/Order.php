<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class   Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'company_id',
        'status_id',
        'details',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
