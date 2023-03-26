@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse($newsList as $news)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="{{ $news['image'] }}"
                             alt="{{ $news['title'] }}">
                        <div class="card-body">
                            <h4>{{ $news['title'] }}</h4>
                            <p class="card-text">{!! $news['description'] !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', ['id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                </div>
                                <small class="text-muted">{{ $news['author'] }} | {{ $news['created_at'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Новостей нет</h2>
            @endforelse
        </div>
    </div>
@endsection

