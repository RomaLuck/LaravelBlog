@extends('loyouts.app')

@section('title')
    Create post
@endsection

@section('body')
<div class="row justify-content-center my-3">
    <div class="col-md-3 ">
<form action="/posts/{{$post->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div>
        <input type="text" class="form-control  mx-3 my-1" name="title" placeholder="title" value="{{$post->title}}">
    </div>
    <div>
        <textarea class="form-control mx-3 my-1" name="body" id="" rows="5" cols="28" placeholder="body">{{$post->body}}</textarea>
    </div>
    <div class="mx-3 my-1">
        <input type="submit" value="edit" class="btn btn-primary">
    </div>
</form>
<form action="/posts/{{$post->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <div class="mx-3 my-1">
        <input type="submit" value="delete" class="btn btn-danger">
    </div>
</form>
</div>
</div>
@endsection
