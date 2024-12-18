<!-- Header -->
<header class="navbar navbar-expand-lg navbar-light bg-dark shadow-sm fixed-top" id="head">
    <div class="container-fluid">
        <!-- Left Side: Dashboard -->
        <a class="navbar-brand fw-bold text-light" href="/dashboard">Dashboard</a>

        <!-- Center: Search Bar -->
        <form class="d-flex mx-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" id="search">
            <button class="btn btn-primary ms-2" type="submit">Search</button>
        </form>

        <!-- Right Side: Profile -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Profile Picture -->
                <img src="{{ asset('images/' . Auth::user()->img) }}" alt="Profile" class="rounded-circle me-2" width="40" height="40">
                <!-- Name Placeholder -->
                <span class="text-white">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <!-- Dropdown Items -->
                <li><a class="dropdown-item" href="{{ route('profile.view') }}">View Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
            </ul>
        </div>
    </div>
</header>
