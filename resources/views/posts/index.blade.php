@extends('layouts.main')

@section('header')
  <h1 style="text-align:center"class="my-5">posts</h1>
@endsection

@section('content')


<table class="table table-dark table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>titolo</th>
      <th>sottotitolo</th>
      <th>testo</th>
      <th>autore</th>
      <th>data</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td> {{ $post->id }}</td>
      <td> {{ $post->title }}</td>
      <td> {{ $post->subtitle }}</td>
      <!-- <td> {{ $post->text }}</td> -->
      <td> {{ $post->author }}</td>
      <td> {{ $post->publication_date }}</td>
      <td>
        <a href="{{ route('posts.show',$post->id) }}" class="btn btn-outline-light"><i class="fas fa-search-plus"></i>mostra</a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection



    <!-- @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->subtitle}}</h2>
        <small>{{ $post->author }}</small>
        <button><a href="{{ route('posts.show',$post->id) }}" class="btn btn-outline-dark"></a><i class="fas fa-search-plus"></i></button>
    @endforeach
  </body>
</html> -->
