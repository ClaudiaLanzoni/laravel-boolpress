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
                <label for="post_content">Content</label>
                <textarea type="text" id="post_content" name="post_content" placeholder="Insert post's content" required></textarea>
            </div>
        
            <div class="m-3">
                <label for="url">Image</label>
                <input type="text" id="url" name="url" placeholder="Insert post's image" required>
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
                        <input type="checkbox" class="form-check-input mx-2" id="tag-{{ $tag->id }}" 
                        value="{{$tag->id}}" name="tags[]" 
                        {{-- @if (in_array($tag->id, old("tags", $tagIds ? $tagIds : [] ))) checked @endif > --}}
                        
                        <label class="form-check-label me-2" for="tag-{{$tag->id}}">{{$tag->name}}</label>    
                    @endforeach
                </div>
            </div>
            
            <div class="m-4">
                <button type="reset">Erase</button>
                <button type="submit">Add</button>
            </div>
            
        </div>
        </form>

    </div>
    
    <div class="text-center m-5">
        <a href="{{route('admin.posts.index')}}">Go back to posts collection</a>
    </div>
    
@endsection