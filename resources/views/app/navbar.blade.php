<nav class="navbar navbar-expand-lg bg-primary shadow" data-bs-theme="dark">
    <div class="container-xl">
        <a class="navbar-brand" href="/">iLearn</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? "active" : "" }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('teachers.*') ? "active" : "" }}" href="/teachers">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('students.*') ? "active" : "" }}" href="{{ route('students.index') }}">Students</a>
                </li>
        </div>
    </div>
</nav>