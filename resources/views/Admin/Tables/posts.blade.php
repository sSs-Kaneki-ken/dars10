@extends('layouts.admin')

@section('title', 'Управление таблиц')

@section('content')

    <div class="page-inner">

        <a class="btn btn-primary" href="{{route('posts.create')}}">Create</a>

        <table class="table table-bordered text-center mt-3">

            <thead>
            <tr>

                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Category Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Options</th>

            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)

                <tr>

                    <th>{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <img src="{{$post->image}}" width="100px" alt="No Image">
                    </td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td style="width: 240px">

                        <form action="{{route('posts.destroy', $post->id)}}" method="POST" style="display: inline-flex">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <a class="btn btn-primary btn-sm" href="{{route('posts.edit', $post->id)}}">Update</a>

                        <a class="btn btn-info btn-sm" href="{{route('posts.show', $post->id)}}">Show</a>

                    </td>

                </tr>

            @endforeach
            </tbody>

        </table>

    </div>

@endsection
