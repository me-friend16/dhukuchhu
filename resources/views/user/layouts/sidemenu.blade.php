<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar ">
    <div class="sidebar-img">
        @php
            $logoName = $logo->name ?? 'Poshan Foods';
            $logoImg = (!empty($logo->image)) ? url('storage/' . $logo->image) : asset('default-logo.png');
        @endphp

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img alt="{{ $logoName }}" class="navbar-brand-img main-logo" src="{{ $logoImg }}">
            <img alt="{{ $logoName }}" class="navbar-brand-img logo" src="{{ $logoImg }}">
        </a>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item @active('dashboard*')" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('profile*')" href="{{ route('profile') }}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Profile</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('logo*')" href="{{ route('logo.index') }}"><i class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Company Details</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('user*')" href="{{ route('user.index') }}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Users</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('heroimage*')" href="{{ route('heroimage.index') }}"><i class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Hero Image</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('gallery*', 'event*')" href="{{ route('gallery.index') }}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Gallery</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('category*') @active('product*')" href="{{ route('product.index') }}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Products</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('team*')" href="{{ route('team.index') }}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Teams</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item @active('contact*')" href="{{ route('admin.contact') }}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Contacted Messages</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="side-menu__icon ni ni-user-run"></i><span class="side-menu__label">Log Out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</aside>