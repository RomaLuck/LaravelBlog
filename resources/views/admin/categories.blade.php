@extends('layouts.admin')

@section('title')
    Edit category
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
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                @if (auth()->user()->hasRole('Admin'))
                                    <a class="btn btn-success"
                                       href="{{route("categories.edit",$category->id)}}">Edit</a>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->hasRole('Admin'))
                                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                        @csrf
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
