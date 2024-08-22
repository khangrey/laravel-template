@use(Modules\Dashboard\Enums\RolesEnum)

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <x-dashboard::application-logo class="logo-dark" />
        <!-- Light Logo-->
        <x-dashboard::application-logo class="logo-light" />
        <button type="button" class="btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover p-0"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span>{{ __('dashboard.Menu') }}</span>
                </li>
                <li class="nav-item">
                    <x-dashboard::sidebar-link href="/dashboard">
                        <i class="bx bx-home"></i>
                        <span> {{ __('dashboard.Home') }} </span>
                    </x-dashboard::sidebar-link>
                </li>

                @can('viewAny-user')
                    <li class="nav-item">
                        <x-dashboard::sidebar-link :href="route('dashboard.users.index')" :class="url()->current() !== route('dashboard.users.index') ? '' : 'active'">
                            <i class="bx bx-user"></i> <span>{{ __('dashboard::app.models.Users') }}</span>
                        </x-dashboard::sidebar-link>
                    </li>
                @endcan

                @if (auth()->user()->hasRole(RolesEnum::SUPERUSER))
                    <li class="nav-item">
                        <x-dashboard::sidebar-link collapse-id="permissions-collapse">
                            <i class="bx bx-shield"></i> <span>{{ __('dashboard::app.models.Guards') }}</span>
                            <x-slot name="collapse">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <x-dashboard::sidebar-link :href="route('dashboard.permissions.index')">
                                            {{ __('dashboard::app.models.Permissions') }}
                                        </x-dashboard::sidebar-link>
                                    </li>
                                    <li class="nav-item">
                                        <x-dashboard::sidebar-link :href="route('dashboard.roles.index')">
                                            {{ __('dashboard::app.models.Roles') }}
                                        </x-dashboard::sidebar-link>
                                    </li>
                                </ul>
                            </x-slot>
                            </x-dashboard.sidebar-link>
                    </li> <!-- end Dashboard Menu -->
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
