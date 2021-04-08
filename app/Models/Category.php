<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;


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


    /**
     * Возвращает родительскую категорию
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    /**
     * Возвращает все подкатегории текущей категории
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    /**
     * Возвращает все заявки для категории
     * @return HasMany
     */
    public function tasks(): hasMany
    {
      return $this->hasMany(Task::class, 'category_id', 'id');
    }


    /**
     * Возвращает все услуги для категории
     * @return HasMany
     */

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }


    /**
     * Возвращает все проекты для категории
     * @return HasMany
     */

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }



    /**
     * Выбирает только категории верхнего уровня
     * @param Builder $query
     * @return Builder
     */
    public function scopeTop(Builder $query)
    {
      return $query->whereNull('parent_id');
    }


    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

}


