<nav class="main-navbar">
    <div class="main-navbar-inner">
        <div class="main-navbar-title"></div>
        <div class="main-navbar-actions">
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-translate"></i>
                    <span>{{ app()->getLocale() }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route("locale", "en") }}">English</a></li>
                    <li><a class="dropdown-item" href="{{ route("locale", "tm") }}">Türkmençe</a></li>
                    <li><a class="dropdown-item" href="{{ route("locale", "ru") }}">Русский</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
