<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(array $columns = ['*']): Collection
    {
        return DB::table($this->table)
            ->join('categories_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftJoin('categories', 'chn.categories_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_title')
            ->get($columns);
    }

    public function getNewsById(int $id, array $columns = ['*']): ?Builder
    {
        return DB::table($this->table)->find($id, $columns);
    }
}
