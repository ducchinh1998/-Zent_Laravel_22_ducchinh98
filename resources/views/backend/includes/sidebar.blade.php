<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              {{ auth()->user()->name }}
          </a>
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
            <a href="#1" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
            </li>
          <li class="nav-header">SẢN PHẨM</li>
          <li class="nav-item">
            <a href="#2" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Quản lý sản phẩm
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.products.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.products.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>

           {{-- Quản lý thương hiệu sản phẩm --}}
          <li class="nav-item">
            <a href="#2" class="nav-link">
              <i class="nav-icon fas fa-cloud"></i>
              <p>
                Quản lý thương hiệu
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.brands.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.brands.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>

            {{-- Quản lý danh mục sản phẩm --}}
            <li class="nav-item">
                <a href="#2" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Quản lý danh mục
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('backend.categoryproducts.create') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tạo mới</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('backend.categoryproducts.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách</p>
                    </a>
                  </li>
                </ul>
              </li>

          <li class="nav-header">NGƯỜI DÙNG</li>
          <li class="nav-item">
            <a href="#2" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý người dùng
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.users.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Quản lý đơn hàng --}}
          <li class="nav-header">ĐƠN HÀNG</li>
          <li class="nav-item">
            <a href="{{ route('backend.orders.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-drumstick-bite"></i>
              <p>Quản lý đơn hàng</p>
            </a>
          </li>

          {{-- Quản lý bài viết --}}
          <li class="nav-header">BÀI VIẾT</li>
          <li class="nav-item">
            <a href="#2" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý bài viết
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.posts.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.posts.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
