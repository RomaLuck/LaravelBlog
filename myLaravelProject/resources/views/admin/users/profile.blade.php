@extends('loyouts.admin')

@section('sidebar')
<p>sidebar</p>
@endsection

@section('body')
<div class="container-md">
<div class="form mt-4">
    <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" aria-label="Имя">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" aria-label="Имя">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="" aria-label="Имя">
        </div>
        <div class="my-1">
            <input class="form-control" type="file" name="file">
        </div>
        <div class="my-2">
            <input type="submit" value="update" class="btn btn-primary">
        </div>
    </form>
    <form action="{{route('users.destroy',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="my-2">
            <input type="submit" value="delete" class="btn btn-danger">
        </div>
    </form>
    </div>
</div>



@endsection
