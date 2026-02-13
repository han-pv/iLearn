<!-- Mobile Navbar -->
<nav class="mobile-navbar">
    <div class="mobile-navbar-brand">
        <h3><i class="bi bi-mortarboard"></i> iLearn</h3>
    </div>
    <button class="navbar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>
</nav>

<!-- Desktop Sidebar -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <h2><i class="bi bi-mortarboard"></i> iLearn</h2>
    </div>

    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-graph-up"></i>
                <span>Dashboard</span>
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
                <span>Teachers</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('students.index') }}"
                class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                <i class="bi bi-backpack"></i>
                <span>Students</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-collection"></i>
                <span>Groups</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link text-danger w-100 border-0">
                <i class="bi bi-box-arrow-right text-danger"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<div class="sidebar-overlay"></div>
