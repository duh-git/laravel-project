<h3>Comments</h3>
<form action="{{ route('articles.comments.store', [$article->id]) }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Your Comment</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Send</button>
  </div>
</form>

@foreach ($article->comments as $comment)
  <div class="card mb-3">
    <div class="card-body">
      <small>{{ $comment->created_at }}</small>
      <p>{{ $comment->content }}</p>
    </div>
    @can('update', $comment)
    <a href="{{ route('comments.edit', [$comment]) }}">Edit</a>
    @endcan
    @can('delete', $comment)
    <form action="{{ route('comments.destroy', [$comment]) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-primary">Delete</button>
    </form>
    @endcan
  </div>
@endforeach