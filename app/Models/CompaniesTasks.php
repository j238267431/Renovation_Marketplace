<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesTasks extends Model
{
    use HasFactory;

    protected $table = 'companies_tasks';
    protected $fillable = [
        'company_id',
        'task_id',
        'price',
        'comment',
        'term',
        'file',
        'created_at',
        'updated_at',
    ];

}
