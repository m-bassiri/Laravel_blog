@extends('layouts.master')
@section('title')
    New Post
@endsection
@section('content')
<form method="POST" action="{{route('editPost')}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleInputEmail1">Post title</label>
      <input type="hidden" value="{{$p[0]->id}}" name="id" />
      <input type="text" class="form-control" name="title" value="{{$p[0]->title}}" id="postTitle">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Post body</label>
      <textarea class="form-control" rows="10" name="body" id="comment">{{$p[0]->body}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection