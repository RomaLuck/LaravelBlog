@extends('loyouts.admin')

@section('sidebar')
<p>sidebar</p>
@endsection

@section('body')
<div class="container-md">
    <picture>
        <source srcset="sourceset" type="image/svg+xml">
        <img src="" class="img-fluid" alt="image desc">
      </picture>
    <form action="" method="get">
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



@endsection
