<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/admin">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Control Panel
            </a>

            <div class="sb-sidenav-menu-heading">General</div>
            <a class="nav-link" href="{{ route('admin.news.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                News
            </a>
            <a class="nav-link" href="{{ route('admin.categories') }}">
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