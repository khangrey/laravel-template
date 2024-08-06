@use(App\Enums\RolesEnum)
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <x-dashboard.application-logo class="logo-dark" />
        <!-- Light Logo-->
        <x-dashboard.application-logo class="logo-light" />
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
                <li class="menu-title"><span>Меню</span></li>
                <li class="nav-item">
                    <x-dashboard.sidebar-link href="/dashboard">
                        <i class="bx bx-home"></i> <span>Главная</span>
                    </x-dashboard.sidebar-link>
                </li>
                @if (auth()->user()->hasRole(RolesEnum::SUPERUSER))
                    <li class="nav-item">
                        <x-dashboard.sidebar-link collapse-id="permissions-collapse">
                            <i class="bx bx-shield"></i> <span>Защита</span>
                            <x-slot name="collapse">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <x-dashboard.sidebar-link :href="route('dashboard.permissions.index')">
                                            Разрешение
                                        </x-dashboard.sidebar-link>
                                    </li>
                                    <li class="nav-item">
                                        <x-dashboard.sidebar-link :href="route('dashboard.roles.index')">
                                            Роли
                                        </x-dashboard.sidebar-link>
                                    </li>
                                </ul>
                            </x-slot>
                        </x-dashboard.sidebar-link>
                    </li> <!-- end Dashboard Menu -->
                @endif
                @can('viewAny-category')
                    <li class="nav-item">
                        <x-dashboard.sidebar-link :href="route('dashboard.categories.index')">
                            <i class="bx bx-collection"></i> <span>Категории</span>
                        </x-dashboard.sidebar-link>
                    </li>
                @endcan
                @can('viewAny-tag')
                    <li class="nav-item">
                        <x-dashboard.sidebar-link :href="route('dashboard.tags.index')">
                            <i class="bx bx-bookmarks"></i> <span>Теги</span>
                        </x-dashboard.sidebar-link>
                    </li>
                @endcan
                @can('viewAny-post')
                    <li class="nav-item">
                        <x-dashboard.sidebar-link :href="route('dashboard.posts.index')">
                            <i class="bx bx-news"></i> <span>Новости</span>
                        </x-dashboard.sidebar-link>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
