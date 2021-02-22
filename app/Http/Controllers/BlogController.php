<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
  // dettaglio post frontend
    public function show($slug){
      $post = Post::where('slug',$slug)->firstOrFail();

      return view('post', compact('post'));
    }

    // aggiungo commenti
    public function addComment(Request $request, $id) {
      // dump($id);
      // dd($request->all());
      $data=$request->all();
      $data['post_id']=$id;

      $newComment = new Comment();
      $newComment->fill($data);
      // $newComment->author = $data['author'];
      // $newComment->text = $data['text'];
      // $newComment->post_id=$id;
      $newComment->save();

      return redirect(url()->previous());
    }
}
