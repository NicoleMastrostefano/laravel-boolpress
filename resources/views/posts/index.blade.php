<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->subtitle}}</h2>
        <small>{{ $post->author }}</small>
    @endforeach
  </body>
</html>
