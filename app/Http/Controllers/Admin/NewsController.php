<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use App\Queries\CategoriesQueryBuilder;
use App\Services\UploadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceResponse;


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
    public function store(Create $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            $request->validated()
        );

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return redirect()->route('admin.news.index')
                ->with('success', __('News successfully added'));
        }

        return back()->with('error', 'The news could not be saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('admin.news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
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
    public function update(Edit $request, News $news, NewsQueryBuilder $builder, UploadService $uploadService)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }

        if ($builder->update($news, $validated)) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): ResourceResponse
    {
        try{
            $news->delete();

            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), [$exception]);

            return response()->json('error', 400);
        }
        /*
         *
         *  try {
            $deleted = $news->delete();
            if($deleted === false) {
                return \response()->json('error', 400);
            }

            return \response()->json('ok');

        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
         * */
    }
}
