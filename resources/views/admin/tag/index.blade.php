@extends('template_db.layout')
@section('title', 'List Tag')  
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <div class="row mb-3">
        <a href="{{ route('tag.create') }}" class="btn btn-success ml-3 mr-3" ><i class="fas fa-plus mr-2"></i>Add new</a>
    </div>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of Tag</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Tag</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tag}}</td>
                    <td>
                        <div class="col-auto ">
                            <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sure?');"><i class="fas fa-trash"></i></button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection