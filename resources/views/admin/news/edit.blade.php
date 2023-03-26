@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать новость</h2>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Выбрать категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($news->categories_id === $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" value="{{ $news->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" value="{{ $news->author }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if($news->status === $status) selected @endif>{{ $status}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description">{!! $news->description !!}</textarea>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
