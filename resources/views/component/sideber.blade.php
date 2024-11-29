<div class="container-fluid">
    <div class="row">
      <!-- Sidebar (4 columns) -->
      <div class="col-md-4 col-lg-3 sidebar">
        <a href="{{ route('home.page')}}">Home</a>
        <a href="/urls">Manage URLs</a>
        <a href="/statistics">Statistics</a>
        <a href="{{ route('profile.view') }}">Profile</a>
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger">Logout</button>
        </form>
      </div>
