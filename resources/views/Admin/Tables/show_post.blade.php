@extends('layouts.admin')

@section('title', 'Подробности')

@section('content')


    <div class="page-inner ">
        <a class="btn btn-primary" href="{{route('posts.index')}}">Back</a>

        <div class="card text-center col-6 offset-3 mt-3" style="width: 40rem;">
            <img src="{{asset($post->image)}}" class="card-img-top" alt="..." style="border-radius: 12px 12px 0 0">
            <div class="card-body">
                <h4 class="text-center">{{$post->category->name}}</h4>
                <hr>
                <h5 class="card-title text-center">{{$post->title}}</h5>
                <p class="card-text fs-5" style="font-family: 'JetBrains Mono Medium'">{{$post->content}}.</p>
            </div>
        </div>

    </div>

@endsection
