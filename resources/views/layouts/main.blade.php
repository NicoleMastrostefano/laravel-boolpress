<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel-boolpress</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <style>
    table img {
      width: 100px;
    }
  </style>

  <body style="background-color:#EEEEEE;">
    <div class="container">
      <header>
        @yield('header')
      </header>
      <main>
        @yield('content')
      </main>
      <footer>
        @yield('footer')
      </footer>
    </div>
  </body>
</html>
