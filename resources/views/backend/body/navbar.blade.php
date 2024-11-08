<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                title="" data-bs-original-title="{{ Cache::has('dark-theme') ? 'Light Mode' : 'Dark Mode' }}">
                <a class="nav-link style-switcher-toggle"
                    href="{{ route(Cache::has('dark-theme') ? 'light-theme' : 'dark-theme') }}">
                    <i class="bx bx-sm {{ Cache::has('dark-theme') ? 'bx-sun' : 'bx-moon' }}"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle"
                        src="{{ auth()->user()->getFirstMediaUrl('avatar', 'thumb-38') ? auth()->user()->getFirstMediaUrl('avatar', 'thumb-38') : asset('backend/assets/images/user.png') }}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle"
                                src="{{ auth()->user()->getFirstMediaUrl('avatar', 'thumb-100') ? auth()->user()->getFirstMediaUrl('avatar', 'thumb-100') : asset('backend/assets/images/user.png') }}">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth()->user()->name }}</p>
                            <p class="tx-12 text-muted">{{ Auth()->user()->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ route('users.edit', Auth()->id()) }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('logout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
