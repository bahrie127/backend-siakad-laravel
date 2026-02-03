<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SIAKAD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">SKD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu Utama</li>

            {{-- Dashboard --}}
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Master Data</li>

            {{-- Users --}}
            <li class="nav-item dropdown {{ Request::is('user*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <ul class="dropdown-menu" style="{{ Request::is('user*') ? 'display: block;' : '' }}">
                    <li class="{{ Request::is('user') && !Request::is('user/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fas fa-list"></i> Daftar User
                        </a>
                    </li>
                    <li class="{{ Request::is('user/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.create') }}">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Subjects / Mata Kuliah --}}
            <li class="nav-item dropdown {{ Request::is('subject*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-book"></i>
                    <span>Mata Kuliah</span>
                </a>
                <ul class="dropdown-menu" style="{{ Request::is('subject*') ? 'display: block;' : '' }}">
                    <li class="{{ Request::is('subject') && !Request::is('subject/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('subject.index') }}">
                            <i class="fas fa-list"></i> Daftar Mata Kuliah
                        </a>
                    </li>
                    <li class="{{ Request::is('subject/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('subject.create') }}">
                            <i class="fas fa-plus"></i> Tambah Mata Kuliah
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Schedules / Jadwal --}}
            <li class="nav-item dropdown {{ Request::is('schedule*') || Request::is('generate-qrcode*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Jadwal Kuliah</span>
                </a>
                <ul class="dropdown-menu" style="{{ Request::is('schedule*') || Request::is('generate-qrcode*') ? 'display: block;' : '' }}">
                    <li class="{{ Request::is('schedule') && !Request::is('schedule/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('schedule.index') }}">
                            <i class="fas fa-list"></i> Daftar Jadwal
                        </a>
                    </li>
                    <li class="{{ Request::is('schedule/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('schedule.create') }}">
                            <i class="fas fa-plus"></i> Tambah Jadwal
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Akademik</li>

            {{-- QR Absensi --}}
            <li class="{{ Request::is('generate-qrcode*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('schedule.index') }}">
                    <i class="fas fa-qrcode"></i>
                    <span>QR Absensi</span>
                </a>
            </li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </aside>
</div>
