@extends('loyouts.app')

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
        <div class="col-md-3">
            <form action="/posts" method="post">
                @csrf
                <div>
                    <input type="text" class="form-control" name="title" placeholder="title" aria-label="Имя">
                </div>
                <div>
                    <textarea class="form-control" name="body" id="" rows="5" cols="28" placeholder="body"></textarea>
                </div>
                <div>
                    <input type="submit" value="create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection