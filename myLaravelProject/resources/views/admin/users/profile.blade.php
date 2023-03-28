@extends('loyouts.admin')

@section('sidebar')
<p>sidebar</p>
@endsection

@section('body')
<div class="container-md">
<div class="form mt-4">
    <form action="" method="get" enctype="multipart/form-data">
        <div class="col-md-4">
          <label for="" class="form-label">Choose file</label>
          <input type="file" class="form-control" name="" id="" placeholder="">
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">First name</label>
            <input type="text" class="form-control" id="" value="{{$user->name}}" required>
          </div>
          <div class="col-md-4">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="" id="" placeholder="{{$user->password}}" required>
          </div>
          <div class="col-md-4">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" id="" value="{{$user->email}}" required>
          </div>

        </form>
    </div>
</div>



@endsection
