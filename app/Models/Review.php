<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'category_id',
        'title',
        'content',
        'rating',
        'recommend',
    ];


    public function getUserAttribute(): User
    {
        return $this->order->user;
    }


    public function getCompanyAttribute(): Company
    {
        return $this->order->company;
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
