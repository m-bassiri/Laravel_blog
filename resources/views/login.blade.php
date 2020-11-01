@extends('layouts.master')
@section('title')
    Login
@endsection
@section('admin_active')
    active
@endsection
@section('content')
    <div class="text-center" style="width: 35%; margin:auto;">
        <form class="form-signin" method="POST" action="{{route('login')}}">
            {{ csrf_field() }}
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
            @endif
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus=""><br />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required=""><br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
@endsection