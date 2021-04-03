<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'level',
        'parent_id',
    ];


    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}


