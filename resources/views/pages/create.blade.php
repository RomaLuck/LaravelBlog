@extends('layouts.main')

@section('title')
Create post
@endsection

@section('body')
<div class="row text-center">
    <div class="col-md-12">
        <h1>Create new post</h1>
    </div>
</div>



<div class="row justify-content-center my-3">
    <div class="col-md-5">
        <form action="/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" class="form-control" name="title" placeholder="title" aria-label="Имя">
            </div>
            <div class="form-group">
                <select class="form-control" id="post-category" name="post-category">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </div>
            <div>
                <textarea class="form-control" name="body" id="" rows="5" cols="28" placeholder="body"></textarea>
            </div>
            <div class="my-1">
                <input class="form-control" type="file" name="file">
            </div>
            <div class="my-2">
                <input type="submit" value="create" class="btn btn-primary">
            </div>
        </form>
    </div>
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
