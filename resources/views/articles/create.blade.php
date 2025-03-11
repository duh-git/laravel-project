@extends('layout')
@section('content')
  <form method="post" action="/article">
    @csrf
    <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
    <label for="date" class="form-label">Date Public</label>
    <input name="datePublic" type="date" class="form-control" id="date">
    </div>
    <div class="mb-3">
    <label for="shortDesc" class="form-label">Short Desc</label>
    <input name="shortDesc" type="text" class="form-control" id="shortDesc">
    </div>
    <div class="mb-3">
    <label for="desc" class="form-label">Desc</label>
    <textarea name="desc" class="form-control" id="desc"></textarea>
    </div>
    <input name="author_id" type="text" value="{{ Auth::user()->id }}" hidden>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection