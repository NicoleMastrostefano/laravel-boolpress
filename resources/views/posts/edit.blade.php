@extends('layouts.main')

@section('header')
  <h1 style="text-align:center"class="mt-5">Modifica post</h1>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('posts.update',$post->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text"class="form-control" id='title' name="title" placeholder="titolo" value="{{ $post->title }}">
  </div>
  <div class="form-group">
    <label for="subtitle">Sottotitolo</label>
    <input type="text" class="form-control" id='subtitle'name="subtitle" placeholder="Sottotitolo"value="{{ $post->subtitle }}">
  </div>
  <div class="form-group">
    <label for="text">Testo</label>
    <textarea name="text" rows="6" class="form-control" id='text'name="text" placeholder="testo"value="{{ $post->text }}"></textarea>
  </div>
  <div class="form-group">
    <label for="author">Autore</label>
    <input type="text" class="form-control" id='author' name="author" placeholder="autore"
    value="{{ $post->author }}">
  </div>

  <div class="text-right">
    <input type="submit" value="Salva"class="btn btn-primary">
  <a href="{{route('posts.index') }}"class="btn btn-dark">Indietro</a>
  </div>

</form>
@endsection
