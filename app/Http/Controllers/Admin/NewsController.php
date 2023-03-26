<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => StatusEnum::getValues(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            $request->only('title', 'author', 'status', 'image', 'description')
        );

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'statuses' => StatusEnum::getValues(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news, NewsQueryBuilder $builder)
    {
        if ($builder->update($news, \request()
            ->only('title', 'author', 'status', 'image', 'description'))) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
