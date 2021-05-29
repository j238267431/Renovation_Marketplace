<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description', 
        'budget',
        'category_id',
        'is_active',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function response(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'companies_tasks');
    }
    public function companies(): HasManyThrough
    {
        return $this->hasManyThrough(Company::class, CompaniesTasks::class, 'task_id', 'id', 'id', 'company_id');
    }
    public function companiesAndResponses(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, CompaniesTasks::class)
            ->withPivot('price', 'comment', 'created_at', 'updated_at');
    }
    public function responses(): HasMany
    {
        return $this->hasMany(CompaniesTasks::class);
    }
    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'attachmentable');
    }
}
