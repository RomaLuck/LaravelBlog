@extends('loyouts.ap')

@section('title')
    Edit role
@endsection

@section('body')
<div class="row justify-content-center my-3">
    <div class="col-md-3">
        <form action="{{route('roles.update',$role->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div>
                <input type="text" class="form-control" name="roleName" value="{{$role->name}}" aria-label="Имя">
            </div>
            <div class="my-2">
                <input type="submit" value="update" class="btn btn-primary">
            </div>
        </form>
        <form action="{{route('roles.destroy',$role->id)}}" method="post">
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
