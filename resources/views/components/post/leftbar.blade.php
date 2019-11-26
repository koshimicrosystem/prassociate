<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('media/images/logo/logo_100X80_64.gif')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'PRA') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('unit.index')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Units</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{route('unit.create')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Add Unit</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{route('access.index')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Access list</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{route('impl.index')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Impl list</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bill.index')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Bills</p>
            </a>
        </li>
          <li class="nav-item">
              <a href="{{route('impl.create')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Impl Create</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{route('access.create')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Access Create</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{route('vend.unit')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Vent Unit</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{route('vend.otc')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>OTC</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('customer.create')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Customer</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('customer.index')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Customer List</p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
