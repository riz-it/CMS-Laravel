@extends('template_db.layout')
@section('title', 'Catalog')  
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
    <a href="{{ route('catalog.create') }}" class="btn btn-success ml-3 mr-3" ><i class="fas fa-plus mr-2"></i>Add new</a>
</div>
<div class="container">
    <div class="card-columns">
        @foreach ($data as $item)
        <div class="card">
            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <form action="{{ route('catalog.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Sure?');" class="btn btn-danger btn-block">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    {{ $data->links() }}
</div>
@endsection