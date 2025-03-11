@extends('layout')
@section('content')
  <div class="card mt-5">
    <div class="card-body">
    <h2 >{{ ucfirst($article->title) }}</h2>
    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->datePublic }}</h6>
    <p class="card-text">{{ $article->desc }}</p>
    @can('update', $article)
    <a href="/article/{{ $article->id }}/edit" class="card-link">Edit</a>
    @endcan
    @can('delete', $article)
    <form action="/article/{{ $article->id }}" method="post">
      @method('DELETE')
      @csrf
      <button class="btn btn-link" type="submit">Delete</button>
    </form>
    @endcan
    </div>
    <div class="container">
    @include('comments.comments')
    </div>
  </div>
@endsection