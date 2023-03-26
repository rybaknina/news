<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoriesQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
