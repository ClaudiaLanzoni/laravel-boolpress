<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.index', compact('posts', 'categories', 'tags'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //request è un oggetto con delle proprietà
    //che è tutto ( all() ) ciò che viene richiesto da una chiamata post (perchè siamo in store)
    //Request è oggetto, $request è la classe
    {
        
        $data = $request->all();
        // $data['post_date'] = Carbon::now();
        // $data['user_id'] = Auth::user()->id;
        

        $post = new Post();
        $post->fill($data);
        $post->save();

        // verifico che esista una chiave tags in data e aggiungo tutti i tag selezionati al post appena salvato
        // $data['tags'] = [1,3];
        // $data['tags'] = null | undefined;
        
        if( array_key_exists('tags', $data) ) $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $tagIds = $post->tags->pluck('id')->toArray();

        return view("admin.posts.edit", compact('post', 'categories', 'tags', 'tagIds'));

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
        
        $data = $request->all();

        $post->update($data); //non c'è bisogno di fare un nuovo oggetto $post = Post::create($data);
        // come in store perchè non ne crea uno nuovo, basta update() al posto di save()

        return redirect()->route('admin.posts.show', $post); //di solito ('posts.show', $post->id)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('admin.posts.index');

        // if ($post->tags) $post->tags()->detach();

        // $post->delete();

        // return redirect()->route('admin.posts.index')->with("deleted_title", $post->title )->with('alert-message', "$post->title è stato eliminato con successo");
    }
}