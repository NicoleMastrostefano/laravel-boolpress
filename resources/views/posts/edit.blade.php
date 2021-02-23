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
    <textarea name="text" rows="6" class="form-control" id='text'name="text" placeholder="testo">{{ $post->text }}</textarea>
  </div>
  <div class="form-group">
    <label for="author">Autore</label>
    <input type="text" class="form-control" id='author' name="author" placeholder="autore"
    value="{{ $post->author }}">
  </div>
  <div class="form-group">
    <label for="publication_date">Data</label>
    <input type="text" class="form-control" id='publication_date' name="publication_date" placeholder="YYYY-MM-GG"
    value="{{ $post->publication_date }}">
  </div>
  <div class="form-group">
    <label for="post_status">Stato del post</label>
    <select class="custom-select" id="post_status"name="post_status">
      <option value="draft" {{ ($post->infoPost->post_status == 'draft') ? 'selected' : '' }} >DRAFT</option>
      <option value="private"{{ ($post->infoPost->post_status == 'private') ? 'selected' : '' }}>PRIVATE</option>
      <option value="public"{{ ($post->infoPost->post_status == 'public') ? 'selected' : '' }}>PUBLIC</option>
    </select>
  </div>
  <div class="form-group">
    <label for="comment_status">Stato commenti</label>
    <select class="custom-select" id="comment_status"name="comment_status">
      <option value="open"{{ ($post->infoPost->comment_status=='open')?'selected': '' }}>OPEN</option>
      <option value="closed"{{ ($post->infoPost->comment_status=='closed')?'selected': '' }}>CLOSED</option>
      <option value="private"{{ ($post->infoPost->comment_status=='private')?'selected': '' }}>PRIVATE</option>
    </select>
  </div>
  @dump($post->tags())
  <div class="form-group">
    <label for="comment_status">TAGS</label>
      @foreach ($tags as $tag)
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="{{ $tag->name }}" name="tags[]" value="{{ $tag->id }}">
          <label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
        </div>
      @endforeach
  </div>
  <div class="text-right">
    <input type="submit" value="Salva"class="btn btn-primary">
  <a href="{{route('posts.index') }}"class="btn btn-dark">Indietro</a>
  </div>

</form>
@endsection
