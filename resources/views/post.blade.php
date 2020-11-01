@extends('layouts.master')
@section('title')
    {{$post[0]->title}}
@endsection
@section('content')
    <h2>{{$post[0]->title}}</h2>
    <p>{{$post[0]->body}}</p>
    <h3>Leave a comment!</h3>
    <form method="POST" action="{{route('comment')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Sender</label>
          <input type="hidden" value="{{$post[0]->id}}" name="id" />
          <input type="text" class="form-control" name="sender" id="sender">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Body</label>
          <textarea class="form-control" rows="5" name="body" id="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div style="height: 32px;"></div>
    <div class="list-group">
        @foreach ($comments as $c)
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{$c->sender}}</h5>
            @if (Session::has('user'))
                <form method="POST" action="{{route('delComment')}}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$c->id}}" name="id"/>
                    <label>
                        <input type="submit" style="display: none;"/>
                        <svg style="color:red;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </label>
                </form>
            @endif
            </div>
            <p class="mb-1">{{$c->body}}</p>
        </div>
        @endforeach
    </div>
@endsection