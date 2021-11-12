@extends('template_db.layout')
@section('title', 'Edit Content')  
@section('content')
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{ $error }}
        </div>
    @endforeach
@endif
<form action="{{ route('listcontent.update', $data->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('patch')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Content</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select name="category" class="form-control" id="exampleFormControlSelect1">
                  @foreach ($category as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Title</label>
                <input type="text" autocomplete="off" class="form-control" id="formGroupExampleInput" value="{{ $data->title}}" name="title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" autocomplete="off" name="description" id="exampleFormControlTextarea1" rows="3">{{ $data->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Closing</label>
                <textarea class="form-control" autocomplete="off" name="closing" id="exampleFormControlTextarea1" rows="3">{{ $data->closing}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Thumbnail</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button class="btn btn-success btn-block btn-sm my-3" type="submit">Update</button>
        </div>
    </div>
</form> 
<a href="/listcontent" class="btn btn-primary">Back</a>
@endsection