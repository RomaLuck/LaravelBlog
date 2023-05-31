@extends('layouts.main')

@section('title')
    Posts
@endsection

@section('body')
    <div class="container-md">
        <div class="row text-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
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
                            <x-post-loop :$post/>
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

