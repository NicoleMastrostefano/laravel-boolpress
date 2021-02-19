<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use Illuminate\Support\Str;

class PostController extends Controller
{
  private $postValidation = [
      'title'=>'required|max:150',
      'subtitle'=>'required|max:150',
      'text'=>'required|max:5000',
      'author'=>'required|max:60',
      'publication_date'=>'required'
  ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data= $request->all();
      $data["slug"]= Str::slug($data['title']);
      $request->validate($this->postValidation);

      // creo e salvo il post
      $post = new Post();
      $title = $post->title;
      $post->fill($data);
      $post->save();

      // creo e salvo il infoPost
      $data['post_id']=$post->id;
      $infoPost =new InfoPost();
      $infoPost->fill($data);
      $infoPost->save();

      return redirect()
      ->route('posts.index')
      ->with('message', 'Post ' . $title. " creato correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $data= $request->all();
      $data["slug"]= Str::slug($data['title']);
      $request->validate($this->postValidation);

      $post->update($data);

      $infoPost =InfoPost::where('post_id',$post->id)->first();
      $data['post_id']=$post->id;
      $post->update($data);

      return redirect()
      ->route('posts.index')
      ->with('message','Post' . " aggiornato correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $title = $post->title;
      $post->delete();

      return redirect()
      ->route('posts.index')
      ->with('message', 'Post ' . $title. " cancellato correttamente!");
    }
}
