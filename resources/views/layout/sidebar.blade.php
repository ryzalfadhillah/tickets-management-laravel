<aside class="main-sidebar sidebar-dark-success elevation-4" style="background-color: #007F73 ">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://source.unsplash.com/random/50x50" width=50 height=50 class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ryzal Fadhillah</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline ">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar border-success" style="background-color: #007F73;"
                    type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-success border-success">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ url('/') }}" class="nav-link @yield('menu-dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/master-admin') }}" class="nav-link @yield('menu-user')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Master Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview @yield('menu-ticket')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Ticket
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ url('/ticket-create') }}" class="nav-link @yield('menu-ticket') nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Buy Ticket</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('/ticket-report') }}" class="nav-link @yield('menu-report') nav-link">
                                <i class="far fa-chart-bar nav-icon"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link @yield('menu-logout')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
