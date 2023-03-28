@extends('loyouts.admin')

@section('body')
<div class="container-md">
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
        <div class="col-md-12 mt-4">
            <h1>Hello, {{Auth::user()->name}}</h1>
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
                        @if (auth()->user()->hasRole('Admin'))
                        <a class="btn btn-success" href="{{route("posts.edit",$post->id)}}">Edit</a>
                        @endif
                    </td>
                    <td>
                        @if (auth()->user()->hasRole('Admin'))
                        <form action="/posts/{{$post->id}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <div>
                                <input type="submit" value="delete" class="btn btn-danger">
                            </div>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
        <div class="mb-4">
            <a href="{{route("posts.create")}}" class="btn btn-primary mx-3">Create new post</a>
        </div>
    </div>
</div>
@endsection
