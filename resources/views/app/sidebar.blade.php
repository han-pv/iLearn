<nav class="mobile-navbar">
    <div class="mobile-navbar-brand">
        <h3><i class="bi bi-mortarboard"></i> iLearn</h3>
    </div>
    <button class="navbar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>
</nav>

<aside class="sidebar">
    <div class="sidebar-logo">
        <h2><i class="bi bi-mortarboard"></i> iLearn</h2>
    </div>

    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-graph-up"></i>
                <span>{{ __("app.dashboard") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('shifts.index') }}"
                class="sidebar-link {{ request()->routeIs('shifts.*') ? 'active' : '' }}">
                <i class="bi bi-clock"></i>
                <span>{{ __("app.shifts") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('courses.index') }}"
                class="sidebar-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i>
                <span>{{ __("app.courses") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('teachers.index') }}"
                class="sidebar-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i>
                <span> {{ __("app.teachers") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('students.index') }}"
                class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                <i class="bi bi-backpack"></i>
                <span> {{ __("app.students") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-collection"></i>
                <span> {{ __("app.groups") }}</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('users.index') }}"
                class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="bi bi-backpack"></i>
                <span> {{ __("app.users") }}</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link text-danger w-100 border-0">
                <i class="bi bi-box-arrow-right text-danger"></i>
                <span>{{ __("app.logout") }}</span>
            </button>
        </form>
    </div>
</aside>

<div class="sidebar-overlay"></div>