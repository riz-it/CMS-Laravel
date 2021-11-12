@extends('template_db.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Hi {{ Auth::user()->name }}</h1>
<div class="jumbotron jumbotron-fluid" style="background:  #4e73df">
    <div class="container">
      <h1 class="display-4 text-white">Welcome to Your Dashboard</h1>
      <p class="lead text-white">You can manage content from your website</p>
    </div>
  </div>
<div class="card shadow mb-4">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Content :</h6>
    </div>
    <div class="card-body">
      <h4 class="small font-weight-bold">Blog <span class="float-right">60%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <h4 class="small font-weight-bold">Product <span class="float-right">80%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <h4 class="small font-weight-bold">Catalog <span class="float-right">70%</span></h4>
      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>

@endsection
