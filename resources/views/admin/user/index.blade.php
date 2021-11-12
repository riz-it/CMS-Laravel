@extends('template_db.layout')
@section('title', 'List User')  
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <div class="row mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-success ml-3 mr-3" ><i class="fas fa-plus mr-2"></i>Add new user</a>
    </div>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of User</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                    <td>
                        @if ($item->type == 1)
                            <span class="badge badge-info">Developer</span>
                        @elseif($item->type == 2)
                            <span class="badge badge-warning">Admin</span>
                        @endif
                    </td>
                    <td>
                        <div class="col-auto ">
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                    <a href="{{route('user.edit', $item->id) }}" class="btn btn-warning btn-circle ">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger " onclick="return confirm('Sure?');"><i class="fas fa-trash"></i></button>
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
    {{ $data->links() }}
</div>
@endsection