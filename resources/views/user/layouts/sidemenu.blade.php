<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="sidebar-img">
        @php
            // Use the null coalescing operator for cleaner code
            $logoName = $logo->name ?? 'Your Company';
            $logoImg = $logo->image ? asset('storage/' . $logo->image) : asset('default-logo.png');
        @endphp

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img alt="{{ $logoName }}" class="navbar-brand-img main-logo" src="{{ $logoImg }}">
            <img alt="{{ $logoName }}" class="navbar-brand-img logo" src="{{ $logoImg }}">
        </a>

        <ul class="side-menu">
            <!-- Main Navigation -->
            <li class="slide-header"><span>Main</span></li>
            <li class="slide">
                <a class="side-menu__item @active('dashboard*')" href="{{ route('dashboard') }}">
                    <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('profile*')" href="{{ route('profile') }}">
                    <i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Profile</span>
                </a>
            </li>

            <!-- Business Operations -->
            <li class="slide-header"><span>Operations</span></li>
            <li class="slide">
                <a class="side-menu__item @active('clients*')" href="{{ route('clients.index') }}">
                    <i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Clients</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('services*')" href="{{ route('services.index') }}">
                    <i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Services</span>
                </a>
            </li>
            
            <!-- Product Management Dropdown -->
             <li class="slide">
                <a class="side-menu__item @active('product*', 'category*')" href="{{ route('product.index') }}">
                    <i class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Products</span>
                </a>
            </li>

            <!-- Equipment Management Dropdown -->
            <li class="slide">
                <a class="side-menu__item @active('equipments*', 'equipment-categories*')" href="{{ route('equipment.index') }}">
                    <i class="side-menu__icon ion ion-settings"></i><span class="side-menu__label">Equipments</span>
                </a>
            </li>

            <!-- Website Content Management -->
            <li class="slide-header"><span>Website Content</span></li>
             <li class="slide">
                <a class="side-menu__item @active('heroimage*')" href="{{ route('heroimage.index') }}">
                    <i class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Hero Image</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('gallery*', 'event*')" href="{{ route('gallery.index') }}">
                    <i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Gallery</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('team*')" href="{{ route('team.index') }}">
                    <i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Team Members</span>
                </a>
            </li>

            <!-- Administration -->
            <li class="slide-header"><span>Administration</span></li>
            <li class="slide">
                <a class="side-menu__item @active('logo*')" href="{{ route('logo.index') }}">
                    <i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Company Details</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('user*')" href="{{ route('user.index') }}">
                    <i class="side-menu__icon fe fe-shield"></i><span class="side-menu__label">Users</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('contact*')" href="{{ route('admin.contact') }}">
                    <i class="side-menu__icon fe fe-inbox"></i><span class="side-menu__label">Contact Messages</span>
                </a>
            </li>
            
            <!-- Logout -->
            <li class="slide">
                <a class="side-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="side-menu__icon fe fe-log-out"></i><span class="side-menu__label">Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>