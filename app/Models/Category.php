<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public static $selectedFields = [
        'id',
        'title',
        'description',
        'created_at'
    ];

    protected $fillable = [
        'title',
        'description'
    ];

    //Relations

    public function news(): HasMany
    {
        return $this->hasMany(News::class,
            'categories_id', 'id');
    }
}
