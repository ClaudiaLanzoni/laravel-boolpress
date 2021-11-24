@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-5">
            <div class="col-6 text-center">
                <h2 class="text-uppercase">{{$post->title}}</h2>
                <p>{{$post->post_content}}</p>
                @if ($post->category) 
                            
                <span class="badge badge-secondary my-2">{{$post->category->name}}</span>
                
                @else --Nessuna categoria-- @endif </td>
            </div>

            <div class="col-6">
                <img src="{{$post->url}}" alt="{{$post->title}}">
            </div>
        </div>
        
    </div>
    
@endsection