@extends('template_db.layout')
@section('title', 'Category of Product')  
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
    <a href="{{ route('categoryproduct.create') }}" class="btn btn-success ml-3 mr-3" ><i class="fas fa-plus mr-2"></i>Add new</a>
</div>
@foreach ($category as $item)
<div class="card mb-4 py-3 border-left-primary">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold
                @if($item->status == 'on')text-success @else text-secondary @endif
                text-uppercase mb-1">
                @if($item->status == 'on')Active @else InActive @endif
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->name }}</div>
              </div>
            <div class="col-auto ">
                <form action="{{ route('categoryproduct.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('categoryproduct.edit', $item->id) }}" class="btn btn-warning btn-circle ">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure?');"><i class="fas fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $category->links() }}
@endsection