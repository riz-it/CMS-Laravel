@include('template_db.header')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  @include('template_db.sidebar')
</ul>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    @include('template_db.topbar')
    <div class="container-fluid">
      <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
      @yield('content')
    </div>
  </div>
@include('template_db.footer')
