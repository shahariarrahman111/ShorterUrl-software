<!-- Header -->
<header class="navbar navbar-expand-lg shadow-sm fixed-top" id="head" style="background-color: #01796F;">
    <div class="container-fluid">
        <!-- Left Side: Logo -->
        <a class="navbar-brand fw-bold text-primary" href="/dashboard" id="shorter-url-logo">
            <span class="shorter-text">Shorter</span><span class="url-text">Url</span>
        </a>
        <!-- Center: Navigation Menus -->
        <div class="d-flex mx-auto">
            <ul class="navbar-nav d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home.page') }}" style="padding: 5px 20px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/hero" style="padding: 5px 20px;">Hero</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('url.form')}}" style="padding: 5px 20px;">EnterUrl</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.dashboard') }}" style="padding: 5px 20px;">Dashboard</a>
                </li>
            </ul>
        </div>

        <!-- Right Side: Profile Dropdown and Login Button -->
        <div class="d-flex align-items-center">
            <!-- Login Button -->
            <a href="/login" class="btn btn-primary me-3" id="log">Login</a>

            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Profile Picture -->
                    <img src="{{ asset('storage/' . Auth::user()->img) }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                    <!-- Name Placeholder -->
                    <span class="text-white">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <!-- Dropdown Items -->
                    <li><a class="dropdown-item" href="{{ route('profile.view') }}">View Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('user.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
