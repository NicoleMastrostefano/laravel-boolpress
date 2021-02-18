@extends('layouts.main')

@section('header')
  <h1 class="mt-5">Dettaglio post</h1>
@endsection

@section('content')
  <table class="table table-dark table-striped table-bordered">
    @foreach ($post->getAttributes() as $key => $value)
    <tr>
      <td> <strong>{{ $key }}</strong> </td>
      <td> {{ $value }}</td>
    </tr>
    @endforeach
    <table class="table table-light table-striped table-bordered">
			<h3>Post Info</h3>
        <thead>
          <tr>
            <th>Post status:</th>
            <th>Comment status:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td> {{ $post->infoPost->post_status }}</td>
            <td> {{ $post->infoPost->comment_status }}</td>
          </tr>
        </tbody>
    </table>
    @if($post->infoPost->post_status == 'private')
    <a href=""class="btn btn-lg btn-dark">Pubblica post</a>
    @elseif($post->infoPost->post_status == 'draft')
    <a href=""class="btn btn-lg btn-dark">modifica post</a>
    @endif
  <div>
    <h2 class="mt-5">Comments</h2>
    @foreach($post->comments as $comment)
    <div>
      <p> {{ $comment->author }}</p>
      <p> {{ $comment->text }}</p>
      <hr>
    </div>
    @endforeach
    @if($post->infoPost->comment_status == 'open' && $post->infoPost->post_status == 'public')
    <a href=""class="btn btn-lg btn-dark">Commenta</a>
    @endif
  </div>
@endsection

@section('footer')
<div class="text-right">
  <a href="{{ route('posts.index')}}"class="btn btn-lg btn-dark">Torna all'elenco</a>
</div>
@endsection
