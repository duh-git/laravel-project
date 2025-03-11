@extends('layout')
@section('content')
  <h2>Contacts</h2>
  <p>{{ $contacts['name'] }}</p>
  <p>{{ $contacts['address'] }}</p>
  <p>{{ $contacts['phone'] }}</p>
  <p>{{ $contacts['email'] }}</p>
@endsection