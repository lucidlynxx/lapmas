        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class='fa fa-book'></i>
                </div>
                <div class="sidebar-brand-text mx-3">LAPMAS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::is('dashboard/reports*') || Request::is('dashboard/users') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Utama</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Data :</h6>
                        <a class="collapse-item" href="/dashboard/reports">Laporan</a>
                        @can('admin')
                        <a class="collapse-item" href="/dashboard/users">Akun <span class="text-muted">(Admin)</span></a>
                        @endcan
                    </div>
                </div>
            </li>

            @can('admin')
                @if ($jmlPemberitahuan == 0)
                <li class="nav-item {{ Request::is('dashboard/messages*') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard/messages">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Pemberitahuan</span></a>
                </li>
                @else
                <li class="nav-item {{ Request::is('dashboard/messages*') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard/messages">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Pemberitahuan </span><span class="badge badge-danger badge-pill" style="font-size: 75%">{{ $jmlPemberitahuan }}</span></a>
                </li>
                @endif
            @else
                @if ($jmlPemberitahuan == 0)
                <li class="nav-item {{ Request::is('dashboard/messages*') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard/messages">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Pesan Pemberitahuan</span></a>
                </li>
                @else
                <li class="nav-item {{ Request::is('dashboard/messages*') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard/messages">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Pesan Pemberitahuan </span><span class="badge badge-danger badge-pill" style="font-size: 75%">{{ $jmlPemberitahuan }}</span></a>
                </li>
                @endif
            @endcan

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->