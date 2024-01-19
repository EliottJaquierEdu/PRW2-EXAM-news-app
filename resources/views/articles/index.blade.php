@extends('layout')

@section('content')
    <h1>Voici les articles</h1>
    <ul>
    @foreach ($articles as $article)
        <li>
            <a href="{{ route('articles.show', $article) }}">
                <span>{{ $article->title }}</span>
                @if(isset($showViewCount) && $showViewCount)
                    <span>({{ $article->views }} {{ $article->views > 1 ? 'vues' : 'vue' }})</span>
                @endif
            </a>
        </li>
    @endforeach
    </ul>
@endsection
