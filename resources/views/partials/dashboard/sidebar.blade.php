<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('PGA_2023_white.png') }}" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Admin<span class="font-weight-light">PGA</span> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('pp.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-white">
                {{ auth()->user()->name }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->route()->named('admin.dashboard')? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.master_location') }}"
                        class="nav-link {{ request()->route()->named('admin.master_location')? 'active': '' }}">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Master Location
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.event_location') }}"
                        class="nav-link {{ request()->route()->named('admin.event_location')? 'active': '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Event Location
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.player_management') }}"
                        class="nav-link {{ request()->route()->named('admin.player_management')? 'active': '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Player Management
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.player_score') }}"
                        class="nav-link {{ request()->route()->named('admin.player_score')? 'active': '' }}">
                        <i class="nav-icon fa-solid fa-golf-ball-tee"></i>
                        <p>
                            Player Score
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.admin') }}"
                        class="nav-link {{ request()->route()->named('admin.admin')? 'active': '' }}">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Admin Management
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item {{ request()->route()->getPrefix() == 'admin/user/'? 'menu-open': 'menu-close' }}">
                    <a href="#"
                        class="nav-link {{ request()->route()->getPrefix() == 'admin/user/'? 'active': '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.admin') }}"
                                class="nav-link {{ request()->route()->named('admin.user.admin')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.siswa') }}"
                                class="nav-link {{ request()->route()->named('admin.user.siswa')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.guru') }}"
                                class="nav-link {{ request()->route()->named('admin.user.guru')? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.informasi_kegiatan') }}"
                        class="nav-link {{ request()->route()->named('admin.informasi_kegiatan')? 'active': '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Informasi Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galeri') }}"
                        class="nav-link {{ request()->route()->named('admin.galeri')? 'active': '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mapel') }}"
                        class="nav-link {{ request()->route()->named('admin.mapel')? 'active': '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Master Mata Pelajaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.bank_soal') }}"
                        class="nav-link {{ request()->route()->named('admin.bank_soal')? 'active': '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Bank Soal
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById(`form_logout`).submit()">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="form_logout" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                        @method('POST')
                        <button type="submit"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
