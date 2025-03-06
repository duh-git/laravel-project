@extends('layout')
@section('content')
  <form method="post" action="/article/{{ $article->id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}">
    </div>
    <div class="mb-3">
    <label for="date" class="form-label">Date Public</label>
    <input name="datePublic" type="date" class="form-control" id="date" value="{{ $article->datePublic }}">
    </div>
    <div class="mb-3">
    <label for="shortDesc" class="form-label">Short Desc</label>
    <input name="shortDesc" type="text" class="form-control" id="shortDesc" value="{{ $article->shortDesc }}">
    </div>
    <div class="mb-3">
    <label for="desc" class="form-label">Desc</label>
    <textarea name="desc" class="form-control" id="desc">{{ $article->desc }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection