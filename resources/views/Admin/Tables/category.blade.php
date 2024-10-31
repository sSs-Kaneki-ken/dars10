@extends('layouts.admin')

@section('title', 'Jadvalni boshqarish')

@section('content')

    <div class="page-inner">

        <a class="btn btn-primary" href="{{route('category.create')}}">Create</a>

        <table class="table table-bordered text-center mt-3">

            <thead>
            <tr>

                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Post-count</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Options</th>

            </tr>
            </thead>

            <tbody>


            @foreach($category as $cat)
                <tr>

                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->posts->count()}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td>{{$cat->updated_at}}</td>
                    <td style="width: 180px">

                        <form action="{{route('category.destroy', $cat->id)}}" method="POST"
                              style="display: inline-flex">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">Delete</button>

                        </form>

                        <a class="btn btn-primary btn-sm" href="{{route('category.edit', $cat->id)}}">Update</a>

                    </td>

                </tr>

            @endforeach


            </tbody>

        </table>

        <div class="d-flex justify-content-center">

            {{$category->links()}}

        </div>

    </div>

@endsection
