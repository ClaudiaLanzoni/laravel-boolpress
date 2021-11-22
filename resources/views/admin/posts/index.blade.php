@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="text-center m-5 text-center">
            <a href="{{route('admin.posts.create')}}"><h2>Insert a new post</h2></a>
        </div>

        <div class="row d-flex justify-content-between">
            @foreach ($posts as $post)
            <div class="col-6 mb-5">
                <a href="{{route('admin.posts.show', $post->id)}}"> 
                    <h2 class="text-uppercase">{{$post->title}}</h2>
                </a>
                    <h4>{{$post->author}}</h4>
                    <p>{{$post->post_topic}}</p>
                    <p>{{$post->post_date}}</p>
                    <p>{{$post->category->name}}</p>

                <div class="d-flex">
                    <button type="button" class="btn btn-primary text-center">
                        <a class="text-white" href="{{route('admin.posts.edit', $post)}}">Edit post</a>
                    </button>

                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete_form">
                        @method('DELETE')
                        @csrf
        
                        <button type="submit" class="btn btn-dark mx-5">Erase "{{$post->title}}"</button>
                        
                    </form>
                </div>
                    
            </div>
            
        @endforeach
        </div>
        
    </div>
@endsection