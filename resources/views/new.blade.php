@extends('layouts.master')
@section('title')
    New Post
@endsection
@section('content')
<form method="POST" action="{{route('submitPost')}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleInputEmail1">Post title</label>
      <input type="text" class="form-control" name="title" id="postTitle">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Post body</label>
      <textarea class="form-control" rows="10" name="body" id="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection