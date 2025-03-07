@extends('layout')
@section('content')
  <form method="post" action="{{ route('comments.update', [$comment]) }}">
    @csrf
    @method('PATCH')
    <div class="mb-3">
    <label for="content" class="form-label">Comment</label>
    <input name="content" type="text" class="form-control" id="content" value="{{ $comment->content }}">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection