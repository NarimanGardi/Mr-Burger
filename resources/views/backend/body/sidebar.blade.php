<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            Help<span> Trading</span>
        </a>
        <div class="sidebar-toggler active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-tachometer"></i>
                    <span class="link-title">داشبۆڕد</span>
                </a>
            </li>
            @can('manage-user')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span class="link-title">بەکارهێنەرەکان</span>
                    </a>
                </li>
            @endcan
            @can('manage-role')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span class="link-title">دەسەڵاتەکان</span>
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('clients.index') }}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-title">مقاولەکان</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Default Theme:</h6>
            <a class="theme-item {{ Cache::has('default-theme') ? 'active' : '' }}" href="{{ route('default-theme') }}">
                <img src="{{ asset('backend/assets/images/screenshots/default.png') }}" alt="light theme">
            </a>
        </div>
    </div>
</nav>
