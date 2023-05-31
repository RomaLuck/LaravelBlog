@extends('layouts.main')

@section('title')
    Users
@endsection

@section('body')
    <div class="container-md">
        <div class="row text-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
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
                        <x-user-loop :$user/>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
