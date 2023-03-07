@extends('loyouts.app')

@section('title')
    Post
@endsection

@section('body')
<h1>Hello</h1>
<p>Your post:</p>
<p>{{$post->title}}</p>
<p>{{$post->body}}</p>
<a href="{{route("posts.edit",$post->id)}}">Edit</a>

@endsection
