<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    @section('menu')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Laravel test site</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/topic') }}">Topics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/block') }}">Blocks</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @show

    <main>
        {{-- Content --}}
        @yield('content')
    </main>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>
</html>
