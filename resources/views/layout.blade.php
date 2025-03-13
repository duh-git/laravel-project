<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title></title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link {{ Route::is('gallery.index') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::is('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">Contacts</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::is('article.index') ? 'active' : '' }}" href="{{ route('article.index') }}">Articles</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::is('article.create') ? 'active' : '' }}" href="{{ route('article.create') }}">Create Article</a></li>
          </ul>
        </div>
        <div class="navbar-nav d-flex justify-content-end">
          @guest
          <li class="nav-item"><a class="nav-link {{ Route::is('registration') ? 'active' : '' }}" href="{{ route('registration') }}">Sign Up</a></li>
          <li class="nav-item"><a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Sign In</a></li>
          @endguest
          @auth
          <li class="nav-item"><a class="nav-link">Hello, {{ ucfirst(Auth::user()->name) }}!</a></li>
          <li class="nav-item"><a class="nav-link {{ Route::is('logout') ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a></li>
          @endauth
        </div>
      </div>
    </nav>
    @if($errors->any())
    <div class="container bg-danger rounded mt-3  ">
      <h4>{{$errors->first()}}</h4>
    </div>
    @endif
  </header>

  <main>
    <div class="container">
      @yield('content')
    </div>
    <div id="app"></div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>