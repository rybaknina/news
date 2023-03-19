@extends('layouts.admin')
@section('content')
    <h1 class="h2">Новости</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->id }}</td>
                    <td>{{ $newsItem->category_title }}</td>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->author }}</td>
                    <td>{{ $newsItem->status }}</td>
                    <td>{{ $newsItem->description }}</td>
                    <td>{{ $newsItem->created_at }}</td>
                    <td><a href="">Ped.</a> &nbsp; | <a href="" class="delete" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
