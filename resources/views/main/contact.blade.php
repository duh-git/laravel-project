@extends('layout')
@section('content')
  <h2>Contacts</h2>
  <p>{{ $contact['name'] }}</p>
  <p>{{ $contact['address'] }}</p>
  <p>{{ $contact['phone'] }}</p>
  <p>{{ $contact['email'] }}</p>
@endsection