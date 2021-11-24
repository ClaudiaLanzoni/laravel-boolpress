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
            <label for="post_content">Content</label>
            <input type="text" id="post_content" name="post_content" placeholder="Edit post's content"
            value="{{$post->post_content}}" required>
        </div>
    
        <div class="m-3">
            <label for="url">Image</label>
            <input type="text" id="url" name="url" placeholder="Edit post's image"
            value="{{$post->url}}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id">
                <option value="{{null}}">Senza categoria</option>
                @foreach ($categories as $category)
                    <option 
                    @if (old('category_id') == $category->id) selected @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <legend class="h5">Tags</legend>
            <div class="form-check form-check-inline">    

                @foreach ($tags as $tag)
                    <input type="checkbox" class="form-check-input mx-2" id="tag-{{ $tag->id }}" value="{{$tag->id}}" name="tags[]" @if (in_array($tag->id, old("tags", $tagIds ? $tagIds : [] ))) checked @endif >
                    
                    <label class="form-check-label me-2" for="tag-{{$tag->id}}">{{$tag->name}}</label>    
                @endforeach
            </div>
        </div>

        
        <div class="m-3">
            <button type="reset">Erase</button>
            <button type="submit">Edit</button>
        </div>
        

    </form>

    <a class="text-center m-5" href="{{route('admin.posts.index')}}">Go back to posts collection</a>
</div>
@endsection