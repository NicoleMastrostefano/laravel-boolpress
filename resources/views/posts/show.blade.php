<!-- PROVE backend gestionale -->


@extends('layouts.main')


@section('content')
  <div class="text-center my-4">
    <h1>{{ $post->title }}</h1>
    <h3> {{ $post->subtitle }}</h3>
    <small> {{$post->author}} - {{$post->publication_date}} - {{ $post->infoPost->post_status }} - {{$post->infoPost->comment_status }}</small>
    <p class="mt-4"> {{ $post->text }}</p>
    <div class="text-right">
      <a href="{{ route('posts.edit',$post->id)}}"class="btn btn-lg btn-dark">Modifica post</a>
    </div>
  </div>
    @if($post->infoPost->post_status == 'public')
    <div>
      <h3 class="my-5">Comments</h3>
      @foreach($post->comments as $comment)
      <div>
        <h5> <i class="fas fa-user"></i> {{ $comment->author }}</h5>
        <p> {{ $comment->text }}</p>
        <small>{{ $comment->created_at }}</small>
        <div class="text-right">
          <form action="{{ route('comment.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
          </form>
        </div>
        <hr>
      @endforeach
      </div>
    <div class="my-5">
      <form action="{{ route('comment.store', ['post_id' => $post->id]) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <input type="text" class="form-control" name="author" id="author"
          placeholder="Your Name" value="">
        </div>
        <div class="form-group">
          <textarea type="text" class="form-control" name="text" id="content" placeholder="Your Comment" value="" rows="3"></textarea>
        </div>
          <input type="submit" class="btn btn-info" value="Add Comment">
        </form>
    </div>
    @endif
  </div>
@endsection

@section('footer')
  <div class="container text-right">
    <a href="{{ route('posts.index')}}"class="btn btn-lg btn-dark">Torna all'elenco</a>
  </div>
@endsection
