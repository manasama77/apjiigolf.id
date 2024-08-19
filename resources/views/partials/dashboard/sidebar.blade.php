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
                        class="nav-link {{ request()->route()->named('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.master_location') }}"
                            class="nav-link {{ request()->route()->named('admin.master_location') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map"></i>
                            <p>
                                Master Location
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.event_location') }}"
                            class="nav-link {{ request()->route()->named('admin.event_location') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                Event Location
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.player_management') }}"
                            class="nav-link {{ request()->route()->named('admin.player_management') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Player Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.player_score') }}"
                            class="nav-link {{ request()->route()->named('admin.player_score') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-golf-ball-tee"></i>
                            <p>
                                Player Score
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.admin') }}"
                            class="nav-link {{ request()->route()->named('admin.admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-secret"></i>
                            <p>
                                Admin Management
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.tournament') }}"
                        class="nav-link {{ request()->route()->named('admin.tournament') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            APJII 7
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tournament.checkin') }}"
                        class="nav-link {{ request()->route()->named('admin.tournament.checkin') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            APJII 7 Checkin
                        </p>
                    </a>
                </li>

                @if (in_array(auth()->user()->role, ['admin', 'staff']))
                    <li class="nav-item">
                        <a href="{{ route('admin.promo_code') }}"
                            class="nav-link {{ request()->route()->named('admin.promo_code') ? 'active' : '' }}">

                            <i class="nav-icon fa-solid fa-receipt"></i>
                            <p>
                                APJII 7 Promo Code
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register_internal_index') }}"
                            class="nav-link {{ request()->route()->named('register_internal_index') ? 'active' : '' }}">

                            <i class="nav-icon fa-solid fa-plus"></i>
                            <p>
                                APJII 7 Register
                            </p>
                        </a>
                    </li>
                @endif


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
