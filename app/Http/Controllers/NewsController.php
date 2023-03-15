<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): string
    {
        $news = $this->getNews();
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id): string
    {
        $news = $this->getNews($id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
