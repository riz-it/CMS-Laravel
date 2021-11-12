      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-id-card"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manage
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-calendar-week"></i>
          <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management Category:</h6>
            <a class="collapse-item" href="{{ route('categoryproduct.index') }}">Category Product</a>
            <a class="collapse-item" href="{{ route('categorycontent.index') }}">Category Content</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-tasks"></i>
          <span>List</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List:</h6>
            <a class="collapse-item" href="{{ route('listproduct.index') }}">List Product</a>
            <a class="collapse-item" href="{{ route('listcontent.index') }}">List Content</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tag.index') }}">
          <i class="fas fa-tags"></i>
          <span>Tag</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('catalog.index') }}">
          <i class="far fa-address-book"></i>
          <span>Catalog</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('jumbotron.index') }}">
          <i class="fas fa-desktop"></i>
          <span>Jumbotron</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Other
      </div>
      @if (Auth::user()->type == 1)
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-user-alt"></i>
          <span>User</span></a>
      </li>
      @endif
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('password.index') }}">
          <i class="fas fa-cog"></i>
          <span>Change Password</span></a>
      </li>
     

    
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>