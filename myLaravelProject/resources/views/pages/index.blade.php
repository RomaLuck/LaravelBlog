@extends('loyouts.app')

@section('title')
    Posts
@endsection

@section('body')
    <div class="row text-center">
        @if (Session::has('post updated'))
        <div class="alert alert-success">{{session('post updated')}}</div>
        @endif
        @if (Session::has('post deleted'))
        <div class="alert alert-danger">{{session('post deleted')}}</div>
        @endif
        <div class="col-md-12">
<h1>Hello</h1>
<p>Your posts:</p>
        </div>
    </div>
    <table id="" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($posts as $post)
                <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><a href="{{route('posts.update',$post->id)}}">Edit</a></td>
                <td><a href="{{route('posts.destroy',$post->id)}}">Delete</a></td>
            </tr>
                @endforeach

        </tbody>
    </table>
    <script src="public/js/tableGenerator.js"></script>
@endsection
