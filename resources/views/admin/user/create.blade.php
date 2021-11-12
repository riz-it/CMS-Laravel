@extends('template_db.layout')
@section('title', 'Add New User')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('user.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input User</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" autocomplete="off" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Email</i></label>
                <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email" autocomplete="off" name="email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInputpas">Password</label>
                <input type="text" class="form-control" id="formGroupExampleInputpas" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInputtype">Type</label>
                <select id="formGroupExampleInputtype" name="type" class="form-control form-control-sm">
                    <option disabled selected>Account Type</option>
                    <option value="1">Developer</option>
                    <option value="2">Administrator</option>
                </select>
            </div>      
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Save</button>
        </div>
    </div>
</form> 
<a href="/user" class="btn btn-primary">Back</a>
@endsection