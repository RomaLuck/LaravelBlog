@extends('loyouts.app')

@section('title')
Posts
@endsection

@section('body')
<div class="row text-center">
    @if (session('createPost'))
    <div class="alert alert-success">
        {{session('createPost')}}
    </div>
    @endif
    @if (session('updated'))
    <div class="alert alert-success">
        {{session('updated')}}
    </div>
    @endif
    @if (session('deleted'))
    <div class="alert alert-danger">
        {{session('deleted')}}
    </div>
    @endif
    <div class="col-md-12">
        <h1>Hello</h1>
        <p>Your posts:</p>
    </div>
</div>
<div class="row justify-content-center">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Body</th>
                <th>Photo</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>



            @if (isset($posts))
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><img height="100" src="images/{{$post->path}}" alt=""></td>
                <td>
                    @can('update', $post)
                    <a class="btn btn-success" href="{{route("posts.edit",$post->id)}}">Edit</a>
                    @endcan
                </td>
                <td>
                    @can('delete', $post)
                    <form action="/posts/{{$post->id}}" method="post">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <div>
                            <input type="submit" value="delete" class="btn btn-danger">
                        </div>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
    <div>
        <a href="posts/create" class="btn btn-primary mx-3">Create new post</a>
    </div>

    @endsection
