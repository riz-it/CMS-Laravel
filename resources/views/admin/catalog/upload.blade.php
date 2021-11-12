@extends('template_db.layout')
@section('title', 'Add New Content')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('catalog.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Upload Catalog</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlFile1">Catalog</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Save</button>
        </div>
    </div>
</form> 
<a href="/catalog" class="btn btn-primary">Back</a>
@endsection