<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'categories_has_news',
            'categories_id', 'news_id');
    }
}
