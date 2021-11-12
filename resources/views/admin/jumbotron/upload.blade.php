@extends('template_db.layout')
@section('title', 'Add New Jumbotron')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('jumbotron.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Upload Jumbotron</h6>
        </div>
        <div class="card-header">
            <div class="form-group">
                <label for="exampleFormControlFile1">Title</label>
                <input type="text" name="title" class="form-control id="exampleFormControlFile1" autocomplete="off">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlFile1">Jumbotron</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="card-body">
               <div class="container">
                <div class="form-group">
                    <label for="image1"><i>Image 1</i></label>
                    <input type="file" name="image1" class="form-control-file" id="image1">
                    <label for="image2"><i>Image 2</i></label>
                    <input type="file" name="image2" class="form-control-file" id="image2">
                    <label for="image3"><i>Image 3</i></label>
                    <input type="file" name="image3" class="form-control-file" id="image3">
                </div>
               </div>
            </div>
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Save</button>
        </div>
    </div>
</form> 
<a href="/catalog" class="btn btn-primary">Back</a>
@endsection