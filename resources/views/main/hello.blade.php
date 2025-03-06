@extends('layout')
@section("content")
  <h2>JSON</h2>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Name</th>
      <th scope="col">Short Desc</th>
      <th scope="col">Desc</th>
      <th scope="col">Preview</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($articles as $article)
    <tr>
      <th scope="row">{{ $article['date'] }}</th>
      <td>{{ $article['name'] }}</td>
      <td>{{ $article['shortDesc'] }}</td>
      <td>{{ $article['desc'] }}</td>
      <td>
      <a href="/gallery/{{ $article['id'] }}"><img src="{{ URL::asset('/images/' . $article['preview_image']) }}" height="100" width="100"
      alt="preview"></a>
      </td>
    </tr>
  @endforeach
    </tbody>
  </table>
@endsection