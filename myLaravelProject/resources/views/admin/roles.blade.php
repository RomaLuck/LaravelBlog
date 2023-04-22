@extends('loyouts.admin')

@section('body')
<div class="container-md">
    <div class="row text-center">
        <div class="col-md-5">
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
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-5">
            <form action="{{route('roles.store')}}" method="post">
                @csrf
                <div class="mb-2">
                    <input type="text" class="form-control" name="roleName" id="" placeholder="Name">
                </div>
                <input type="submit" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>


                @if (isset($roles))
                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->slug}}</td>
                    <td>
                        @if (auth()->user()->hasRole('Admin'))
                        <a class="btn btn-success" href="{{route("roles.edit",$role->id)}}">Update</a>
                        @endif
                    </td>
                    <td>
                        @if (auth()->user()->hasRole('Admin'))
                        <form action="{{route('roles.destroy',$role->id)}}" method="post">
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
