@extends('loyouts.app')

@section('title')
    Create post
@endsection

@section('body')
<div class="row justify-content-center my-3">
    <div class="col-md-3">
        <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" class="form-control" name="title" placeholder="{{$post->title}}" aria-label="Имя">
            </div>
            <div>
                <textarea class="form-control" name="body" id="" rows="5" cols="28" placeholder="{{$post->body}}"></textarea>
            </div>
            <div class="my-1">
                <input class="form-control" type="file" name="file">
            </div>
            <div class="my-2">
                <input type="submit" value="update" class="btn btn-primary">
            </div>
        </form>
        <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="my-2">
                <input type="submit" value="delete" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
@endsection
