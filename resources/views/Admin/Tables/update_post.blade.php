@extends('layouts.admin')

@section('title', 'Добавить Новую-Категорию')

@section('content')

    <div class="page-inner">

        <a class="btn btn-primary" href="{{route('posts.index')}}">Back</a>

        <form action="{{route('posts.update', $post->id)}}" method="POST" class="col-6 offset-3 mt-3"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3 text-center">
                <input type="text" class="form-control text-center" id="title" name="title"
                       aria-describedby="emailHelp" value="{{$post->title}}"
                       placeholder="Название поста">
                @error('title')

                <span class="text-danger" style="font-size: 15px">{{$message}}</span>

                @enderror
            </div>

            <div class="mb-3 text-center">
                <label for="cat_id" class="form-label">Выберите Категорию</label>

                <select class="form-control" name="cat_id" id="cat_id">
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}"
                            @if($post->cat_id == $cat->id)
                                {{' selected'}}
                            @endif>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-center">
                <input class="form-control text-center" id="description" name="description"
                       placeholder="Введите короткое описание" type="text" value="{{$post->description}}">

                @error('description')

                <span class="text-danger" style="font-size: 15px">{{$message}}</span>

                @enderror
            </div>
            <div class="mb-3 text-center">
                <img src="{{asset($post->image)}}" width="250px">
            </div>
            <div class="mb-3 text-center">

                <label for="image" class="form-label">Выберите новое изображение для поста:</label>

                <input type="file" name="image" id="image" class="form-control">

                @error('image')

                <span class="text-danger" style="font-size: 15px">{{$message}}</span>

                @enderror

            </div>

            <div class="mb-3 text-center">

                <textarea class="text-center" cols="52" rows="7" name="content"
                          placeholder="Введите подробности о ващем посте" >{{$post->content}}</textarea>

            </div>

            <button type="submit" class="btn btn-primary form-control btn-sm" style="width: 350px; margin-left: 57px">
                Save
            </button>

        </form>

    </div>

@endsection
