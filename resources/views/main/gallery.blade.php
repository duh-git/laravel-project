@extends('layout')
@section('content')
  <p>{{ $article['name'] }}</p>
  <p>{{ $article['date'] }}</p>
  <img src="{{ URL::asset('/images/' . $article['full_image']) }}" height="500" alt="image">
  <p>{{ $article['desc'] }}</p>
@endsection