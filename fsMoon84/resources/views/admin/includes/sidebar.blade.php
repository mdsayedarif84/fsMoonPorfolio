@php
    $userId =  Auth::user()->id;
    // dd($userId);
    $profileUserId =DB::table('profiles')
                ->join('users','profiles.user_id', '=', 'users.id')
                ->select('users.name','users.id','profiles.user_id','profiles.image')
                ->where('profiles.user_id',$userId)
                ->first();
                  // dd($profileUserId);
@endphp 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{asset('admin/images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset($profileUserId->image)}}"class="img-circle elevation-2"  alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$profileUserId->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">click</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('manage.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">click</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add.slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('manage.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Slider</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">click</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('about')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('manage.about')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage About</p>
                </a>
              </li>
              
            </ul>
          </li>
                    
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
                <span class="text-yellow badge badge-info right">Click For More</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     About
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('about')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add About</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Service
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('add.service')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Service</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     User
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('add.user')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add User</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Add Service
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>