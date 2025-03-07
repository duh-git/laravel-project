@extends('layout')
@section('content')
  <form method="post" action="/auth/registration">
    @csrf
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" id="name">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
@endsection