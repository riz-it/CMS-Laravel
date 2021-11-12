@extends('template_db.layout')
@section('title', 'Change Password')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('password.update', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
    @method('patch')
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Password</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Old Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" autocomplete="off" name="pass">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">New Password</i></label>
                <input type="password" class="form-control" id="formGroupExampleInput" autocomplete="off" name="passnew1">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInputpas">Confirm Password</label>
                <input type="password" class="form-control" id="formGroupExampleInputpas" name="passnew2">
            </div>
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Save</button>
        </div>
    </div>
</form> 
<a href="/home" class="btn btn-primary">Back</a>
@endsection