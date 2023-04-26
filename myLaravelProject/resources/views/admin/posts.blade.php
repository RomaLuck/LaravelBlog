@extends('loyouts.admin')

@section('body')
<div class="container-md">
    <div class="row text-center">
        @if (session('created'))
        <div class="alert alert-success">
            {{session('created')}}
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

        <form action="/admin/posts/delete" method="post">
            @csrf
            @method('DELETE')
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="options"></th>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @if (isset($posts))
                    @foreach ($posts as $post)
                    <tr>
                        <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" id="" value="{{$post->id}}"></td>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->category->name??''}}</td>
                        <td><img height="10" src="images/{{$post->path}}" alt=""></td>
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
            <div class="form-group">
                <input type="submit" value="Delete choosen" class="btn btn-danger">
            </div>
            <div class="form-group mt-3">
                <a href="{{route("posts.create")}}" class="btn btn-primary  ">Create new post</a>
            </div>
        </form>
    </div>
</div>
@endsection

