@extends('layouts.master')
@section('content')
    @foreach ($posts as $p)
    <div class="card" style="margin-bottom: 10px;">
        <div class="card-body">
          <h5 class="card-title">{{$p->title}}</h5>
            <p class="card-text">{{str_limit($p->body, 100)}}</p>
          <a href="/posts/{{$p->id}}" class="btn btn-primary" style="float: left; margin-right:5px;">Read More!</a>
          @if (Session::has('user'))
          <a href="/edit/{{$p->id}}" role="button" class="btn btn-outline-warning" style="float: left; margin-right:5px;">
            Edit
          </a>
          <form method="POST" action="{{route('delPost')}}" style="float: left; margin-right:5px;">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$p->id}}" />
            <button class="btn btn-outline-danger">Delete</button>
          </form>
    @endif
        </div>
    </div>
    @endforeach
    @if (Session::has('user'))
    <a href="/new" role="button" class="btn btn-outline-success">
      New Post
    </a>
    @endif
@endsection
@section('title')
    My Blog!
@endsection
@section('home_active')
    active
@endsection