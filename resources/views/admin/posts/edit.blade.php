@extends('layouts.app')

@section('content')
<div class="container text-center">

    <h4>Edit post {{$post->title}}</h4>

    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @method('PATCH')

        @csrf
        <div class="m-3">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Edit post's title"
            value="{{$post->title}}" required>
        </div>
    
        <div class="m-3">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="Edit post's author"
            value="{{$post->author}}" required>
            {{-- riceviamo entità da modificare dal controller e inseriamo i valori preesistenti tramite value --}}
        </div>
    
        <div class="m-3">
            <label for="topic">Topic</label>
            <input type="text" id="topic" name="topic" placeholder="Edit post's topic" 
            value="{{$post->post_topic}}" required>
        </div>

        <div class="m-3">
            <label for="content">Content</label>
            <input type="text" id="content" name="content" placeholder="Edit post's content"
            value="{{$post->post_content}}" required>
        </div>
    
        <div class="m-3">
            <label for="url">Image</label>
            <input type="text" id="url" name="url" placeholder="Edit post's image"
            value="{{$post->url}}" required>
        </div>
        
        <div class="m-3">
            <button type="reset">Erase</button>
            <button type="submit">Edit</button>
        </div>
        

    </form>

    <a class="text-center m-5" href="{{route('admin.posts.index')}}">Go back to posts collection</a>
</div>
@endsection