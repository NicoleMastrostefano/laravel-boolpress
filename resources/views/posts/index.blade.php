@extends('layouts.main')

@section('header')
  <h1 style="text-align:center"class="my-5">Boolpress - All posts</h1>
@endsection

@section('content')
@if (session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div>
@endif


<table class="table table-light table-striped table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Titolo</th>
      <th>Autore</th>
      <th>Data</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td> {{ $post->id }}</td>
      <td> {{ $post->title }}</td>
      <td> {{ $post->author }}</td>
      <td> {{ $post->publication_date }}</td>
      <td>
        <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info"><i class="fas fa-search-plus"></i></a>
      </td>
      <td>
        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
      </td>
      <td>
        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('footer')
<div class="text-right">
  <a href="{{ route('posts.create')}}"class="btn btn-lg btn-dark mb-5">Crea un nuovo post</a>
</div>
@endsection
