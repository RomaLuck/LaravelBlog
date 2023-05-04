@extends('loyouts.ap')

@section('title')
    Create post
@endsection

@section('body')
<div class="row justify-content-center my-3">
    <div class="col-md-3">
        <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" class="form-control" name="title" value="{{$post->title}}" aria-label="Имя">
            </div>
            <div>
                <textarea class="form-control" name="body" id="" rows="5" cols="28">{{$post->body}}</textarea>
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
