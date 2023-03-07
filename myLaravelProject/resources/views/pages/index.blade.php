@extends('loyouts.app')

@section('title')
    Posts
@endsection

@section('body')
    <div class="row text-center">
        <div class="col-md-12">
<h1>Hello</h1>
<p>Your posts:</p>
        </div>
    </div>
<div class="row justify-content-center">
    <div class="col-md-3 ">
<ul  class="list-group mx-3 my-3">
    @foreach ($posts as $post)
        <li  class="list-group-item list-hover">
            <a href="{{route("posts.edit",$post->id)}}">{{$post->title}}</a>
        </li>
    @endforeach
</ul>

<a href="posts/create" class="btn btn-primary mx-3">Create new post</a>
        </div>
    </div>
</div>
@endsection
