@extends('layouts.main')

@section('title')
    Roles
@endsection

@section('body')
    <div class="container-md">
        <div class="row text-center">
            <div class="col-md-5">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
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
                        <x-role-loop :$role/>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
