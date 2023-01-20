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
            {!! Form::open(['method'=>'POST', 'action'=>"\App\Http\Controllers\PagesController@store",'files'=>true]) !!}
            {{-- <form action="/posts" method="post">
                @csrf --}}
                <div>
                    {!! Form::text('title',null, ['class'=>"form-control",'placeholder'=>"title"]) !!}
                    {{-- <input type="text" class="form-control" name="title" placeholder="title" aria-label="Имя"> --}}
                </div>
                <div>
                    {!! Form::textarea('body', null, ['class'=>"form-control",'placeholder'=>'body']) !!}
                    {{-- <textarea class="form-control" name="body" id="" rows="5" cols="28" placeholder="body"></textarea> --}}
                </div>
                <div>
                    {!! Form::file('file', ['class'=>"form-control"]) !!}
                    {{-- <input type="file" name="file" id="" enctype="multipart/form-data"> --}}
                </div>
                <div>
                    {!! Form::submit('enter', ['class'=>'btn btn-primary']) !!}
                    {{-- <input type="submit" value="create" class="btn btn-primary"> --}}
                </div>
                {!! Form::close() !!}
            {{-- </form> --}}
            @if ($errors->any())
            <ul class="text-danger">
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>

            @endif
        </div>
    </div>
</div>
@endsection
