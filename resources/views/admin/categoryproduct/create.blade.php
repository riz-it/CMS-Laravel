@extends('template_db.layout')
@section('title', 'Add New Category')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('categoryproduct.store') }}" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Category</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" autocomplete="off" class="form-control" id="formGroupExampleInput" placeholder="Name of category" name="name">
            </div>
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Save</button>
        </div>
    </div>
</form>
<a href="/categoryproduct" class="btn btn-primary">Back</a>
@endsection