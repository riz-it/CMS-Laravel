@extends('template_db.layout')
@section('title', 'Edit Category')  
@section('content')
<form action="{{ route('categoryproduct.update', $category->id) }}" method="POST">
    @csrf
    @method('patch')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ $category->name }}</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" autocomplete="off" class="form-control" name="name" id="formGroupExampleInput" value="{{ $category->name }}">
            </div>
            <select class="custom-select" name="status">
                @if ($category->status == 'on')
                <option value="on" selected>Active</option>
                <option value="off">Inactive</option>
                @else
                <option value="on">Active</option>
                <option value="off" selected>Inactive</option>
                @endif
            </select>
            <button class="btn btn-success btn-block btn-sm my-3">Update</button>
        </div>
    </div>
</form>
<a href="/categoryproduct" class="btn btn-primary">Back</a>
@endsection