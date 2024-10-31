@extends('layouts.admin')

@section('title', 'Обновить Категорию')

@section('content')

    <div class="page-inner">

        <a class="btn btn-primary" href="{{route('category.index')}}">Back</a>

        <form action="{{route('category.update', $category->id)}}" method="POST" class="col-6 offset-3 mt-3">

            @csrf
            @method('PUT')

            <div class="mb-3 text-center">

                <label for="name" class="form-label">Название</label>

                <input type="text" class="form-control text-center" id="name" name="name"
                       aria-describedby="emailHelp"
                       placeholder="Введите название категории">

                @error('name')

                    <span class="text-danger" style="font-size: 15px">{{$message}}</span>

                @enderror

            </div>

            <button type="submit" class="btn btn-primary form-control btn-sm" style="width: 350px; margin-left: 57px">
                Save
            </button>

        </form>

    </div>

@endsection
