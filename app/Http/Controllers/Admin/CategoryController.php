<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::query()
            ->select(Category::$selectedFields)->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255']
        ]);

        $category = new Category(
            $request->only(['title', 'description'])
        );

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
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
