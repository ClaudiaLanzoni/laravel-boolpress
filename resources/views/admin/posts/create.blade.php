@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <h4>Insert a new post</h4>

        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="m-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Insert post's title" required>
            </div>
            
            <div class="m-3">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" placeholder="Insert post's author" required>
            </div>

            <div class="m-3">
                <label for="topic">Topic</label>
                <input type="text" id="topic" name="topic" placeholder="Insert post's topic" required>
            </div>
            
            <div class="m-3">
                <label for="description">Content</label>
                <textarea type="text" id="description" name="description" placeholder="Insert post's content" required></textarea>
            </div>
        
            <div class="m-3">
                <label for="url">Image</label>
                <input type="text" id="url" name="url" placeholder="Insert post's image" required>
            </div>
            
            <button type="reset">Erase</button>
            <button type="submit">Add</button>

        </form>

    </div>
    
    <div class="text-center m-5">
        <a href="{{route('admin.posts.index')}}">Go back to posts collection</a>
    </div>
    
@endsection