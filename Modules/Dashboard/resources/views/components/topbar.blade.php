<header id="page-topbar" class="topbar-shadow">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box horizontal-logo">
                    <x-dashboard::application-logo class="logo-dark" />
                    <x-dashboard::application-logo class="logo-light" />
                </div>

                <button type="button" class="btn btn-sm fs-16 header-item vertical-menu-btn topnav-hamburger px-3"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="header-item d-none d-sm-flex ms-1">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ auth()->user()->avatar_url }}"
                                alt="Header Avatar">
                            <span class="ms-xl-2 text-start">
                                <span
                                    class="d-none d-xl-inline-block fw-medium user-name-text ms-1">{{ auth()->user()->name }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('dashboard.profile.edit') }}">
                            <span class="align-middle">
                                {{ __('dashboard::app.Profile') }}
                            </span>
                        </a>
                        <x-dashboard::logout-button class="dropdown-item" :action="route('dashboard.logout')" method="delete">
                            <i class="mdi mdi-logout text-muted fs-16 me-1 align-middle"></i>
                            <span class="align-middle">
                                {{ __('dashboard::app.buttons.Logout') }}
                            </span>
                        </x-dashboard::logout-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
