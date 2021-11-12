@extends('template_db.layout')
@section('title', 'List of Product')  
@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="row mb-3">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 mb-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
            </div>
        </div>
    </form>
    <a href="{{ route('listproduct.create') }}" class="btn btn-success ml-3 mr-3" ><i class="fas fa-plus mr-2"></i>Add new</a>
</div>
@foreach ($data as $item)
<div class="card mb-4 py-3 border-left-primary">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                {{ $item->category }}
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->name }}</div>
            </div>
            <div class="col-auto ">
                <form action="{{ route('listproduct.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-info btn-circle "  data-toggle="modal" data-target="#exampleModal{{ $item->id}}">
                            <i class="far fa-eye"></i>
                        </button>
                        <a href="{{ route('listproduct.edit', $item->id) }}" class="btn btn-warning btn-circle ">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure?');"><i class="fas fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card" style="" >
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Category : {{ $item->category }}</li>
                    <li class="list-group-item">Rp. {{ $item->price }}.000</li>
                </ul>
            </div>
        </div>
        <div class="modal-footer">     
            <a href="" class="btn btn-success float-right">Order Now!</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
{{ $data->links() }}
@endsection