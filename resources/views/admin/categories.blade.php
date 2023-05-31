@extends('layouts.main')

@section('title')
    Categories
@endsection

@section('body')
    <div class="row my-3">
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <div class="col-md-5">
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div>
                    <label>
                        <input type="text" class="form-control" name="name" placeholder="New category" required>
                    </label>
                </div>
                <div class="my-2">
                    <input type="submit" value="Create" class="btn btn-primary">
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
        <div class="row justify-content-center">
            <table id="myTable" class="display">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($categories))
                    @foreach ($categories as $category)
                        <x-category-loop :$category/>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
