<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <a class="nav-link" href="{{ route('panel.notifications.index') }}">
                <div class="nav-link-icon">
                   <i class="fas fa-bell"></i>
                </div>
                Notifications
            </a>
        </div>
    </div>

    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">{{ __('Logged in as:') }}</div>
            <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
        </div>
    </div>
</nav>
