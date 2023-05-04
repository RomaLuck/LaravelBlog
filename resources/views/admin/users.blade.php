@extends('layouts.admin')

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
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created_at</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>


                @if (isset($users))
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><img height="100" src="images/{{$user->path}}" alt=""></td>
                    <td>
                        @if (auth()->user()->hasRole('Admin'))
                        <a class="btn btn-success" href="{{route("users.edit",$user->id)}}">Edit</a>
                        @endif
                    </td>
                    <td>
                        @if (auth()->user()->hasRole('Admin'))
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
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
    </div>
</div>
@endsection
