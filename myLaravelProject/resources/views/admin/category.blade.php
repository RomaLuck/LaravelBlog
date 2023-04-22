@extends('loyouts.ap')

@section('title')
    Edit category
@endsection

@section('body')
<div class="row justify-content-center my-3">
    <div class="col-md-3">
        <form action="{{route('categories.update',$category->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" class="form-control" name="name" value="{{$category->name}}" aria-label="Имя">
            </div>
            <div class="my-2">
                <input type="submit" value="update" class="btn btn-primary">
            </div>
        </form>
        <form action="{{route('categories.destroy',$category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="my-2">
                <input type="submit" value="delete" class="btn btn-danger">
            </div>
        </form>
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
