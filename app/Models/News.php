<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\News\StatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'categories_id' => 'array',
    ];

    public function scopeStatus(Builder $query): Builder
    {
        return $query->where('status', StatusEnum::DRAFT->value)
            ->orWhere('status', StatusEnum::PUBLISHED->value);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_has_news',
            'news_id', 'categories_id', 'id', 'id');
    }
}
