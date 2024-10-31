@extends('layouts.login')

@section('title', 'Ro'yxatga olish')

@section('content')

    <h3 class="mb-4 text-center">Akkaunt yaratish</h3>
    <form action="{{route('register')}}" class="signin-form" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="name">
            @error('name')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
            @error('email')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-field" type="password" class="form-control" placeholder="Password" name="password">
            <span toggle="#password-field"
                  class="fa fa-fw fa-eye field-icon toggle-password"></span>
            @error('password')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">Kirish</button>
        </div>

    </form>
    <div class="social form-group">
        <a href="{{route('loginPage')}}" class="form-control btn btn-primary submit px-3">
            Login</a>
    </div>

@endsection
