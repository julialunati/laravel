<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link @if(request()->is('admin')) active @endif" href="/admin">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Control Panel
            </a>

            <div class="sb-sidenav-menu-heading">General</div>
            <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                News
            </a>
            <a class="nav-link nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                Categories
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>