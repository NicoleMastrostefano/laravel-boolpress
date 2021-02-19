@extends('layouts.main')

@section('content')
<section id="article">
  <header class="text-center my-4">
    <h1 class="mt-4">{{ $post->title }}</h1>
    <h3> {{ $post->subtitle }}</h3>
    <small> {{$post->author}} - {{$post->publication_date}} - {{ $post->infoPost->post_status }} - {{$post->infoPost->comment_status }}</small>
  </header>
  <main>
    <p> {{ $post->text }}</p>
  </main>
</section>

@if($post->infoPost->comment_status == 'open')
<section id="comments">
  <h2>Commenti</h2>
  @foreach ($post->comments as $comment)
  <div class="my-4">
    <small> {{ $comment->author }} - {{ $comment->created_at }}</small>
    <p> {{ $comment->text }}</p>
  </div>
  @endforeach
</section>
<section id="form">
  <div class="my-5">
    <form action="{{ route('add-comment', $post->id) }}" method="POST">
      @csrf
      @method('POST')
      <div class="form-group">
        <input type="text" class="form-control" name="author" id="author"
        placeholder="Scrivi qui il tuo nickname" value="">
      </div>
      <div class="form-group">
        <textarea type="text" class="form-control" name="text" id="content" placeholder="Scrivi qui il tuo commento" value="" rows="3"></textarea>
      </div>
      <div class="text-right">
        <input type="submit" class="btn btn-success" value="Invia">
      </div>
    </form>
  </div>
</section>
@endif
@endsection
