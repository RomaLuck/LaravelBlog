@extends('layouts.admin')

@section('sidebar')
<p>sidebar</p>
@endsection

@section('body')
@if (session('attach'))
<div class="alert alert-success">
    {{session('attach')}}
</div>
@endif
@if (session('detach'))
<div class="alert alert-success">
    {{session('detach')}}
</div>
@endif
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
<div class="row justify-content-center">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Options</th>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Attach</th>
                <th>Detach</th>
            </tr>
        </thead>
        <tbody>


            @if (isset($roles))
            @foreach ($roles as $role)
            <tr>
                <td>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id=""
                    @foreach ($user->roles as $user_role)
                        @if ($user_role->slug == $role->slug)
                         checked
                        @endif
                    @endforeach
                    >
                </div>
                </td>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                <td>
                    <form action="{{route('user.attach',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role" value="{{$role->id}}">
                    <input type="submit" name="attach" class="btn btn-success" value="Attach"
                    @if ($user->roles->contains($role))
                        disabled
                    @endif
                    >
                    </form>
                </td>
                <td>
                <form action="{{route('user.detach',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role" value="{{$role->id}}">
                    <input type="submit" name="detach" class="btn btn-danger" value="Detach"
                    @if (!$user->roles->contains($role))
                    disabled
                @endif
                    >
                    </form>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
</div>


@endsection
