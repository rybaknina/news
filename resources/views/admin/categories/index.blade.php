@extends('layouts.admin')
@section('content')
    <h1 class="h2">Категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                категорию</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $categoriesItem)
                <tr>
                    <td>{{ $categoriesItem->id }}</td>
                    <td>{{ $categoriesItem->title }}</td>
                    <td>{{ $categoriesItem->description }}</td>
                    <td>{{ $categoriesItem->created_at }}</td>
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
