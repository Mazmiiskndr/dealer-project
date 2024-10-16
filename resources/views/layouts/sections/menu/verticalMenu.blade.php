@php
$configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if(!isset($navbarFull))
    <div class="app-brand demo">
        <a href="{{url('/')}}" class="app-brand-link">
            <img class="img-fluid" src="{{ asset('assets/img/logos/honda.png') }}" width="50" alt="">
            <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    @endif


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-3">
        <!-- Dashboard Menu  -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('backend.dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-dashboard"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Blog Management Item -->
        <li class="menu-item {{ request()->is('blogs*') || request()->is('categories*') || request()->is('tags*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-news"></i>
                <div>Blog Management</div>
            </a>

            <!-- Submenu for Blog, Tags & Categories -->
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('blogs') ? 'active' : '' }}">
                    <a href="{{ route('backend.blogs.index') }}" class="menu-link ml-4">
                        <div>Blogs</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('categories') ? 'active' : '' }}">
                    <a href="{{ route('backend.categories.index') }}" class="menu-link ml-4">
                        <div>Categories</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('tags') ? 'active' : '' }}">
                    <a href="{{ route('backend.tags.index') }}" class="menu-link ml-4">
                        <div>Tags</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Settings Menu  -->
        <li class="menu-item">
            <a href="#" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-adjustments-horizontal"></i>
                <div>Settings</div>
            </a>
        </li>

    </ul>

</aside>
