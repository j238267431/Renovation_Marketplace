<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'cover',
        'description'
    ];

  //TODO добавить категорию компании

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'company_user')
      ->withPivot('role_id');
  }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

  public function projects(): HasMany
  {
    return $this->hasMany(Project::class);
  }


  public function scopeActive(Builder $query, int $count): Builder
  {
    return $query
      ->select('companies.*')
      ->selectSub(Order::query()
          ->selectRaw('max(created_at)')
          ->whereColumn('company_id', 'companies.id'),
        'last_order')
      ->orderBy('last_order', 'DESC')
      ->orderBy('companies.updated_at', 'DESC')
      ->take($count);
  }
}
