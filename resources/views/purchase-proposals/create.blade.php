@extends('layout')

@section('content')
    <h1>Faire une nouvelle enchère</h1>
    <p>Enchérir sur l'article '{{ $article->title }}'</p>
    <form method="POST" action="{{ route('articles.auctions.store', $article) }}">
        @csrf
        @include('purchase-proposals.fields')
        <br>
        <input type="submit" value="Enchérir">
    </form>
@endsection
