
<div class="container mt-5 profile-container">
    <div class="profile-header text-center">
        <h2>Welcome, {{ $user->name }}!</h2>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <!-- Profile Image -->
            <img src="{{ asset('images/' . Auth::user()->img) }}" alt="Profile Image" class="profile-image">
        </div>
        <div class="col-md-8">
            <div class="profile-info">
                <h4>Profile Information</h4>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <!-- Edit Profile Button -->
                <button class="btn" data-bs-toggle="modal" data-bs-target="#editProfileModal" id="butn">Edit Profile</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" id="butt">
                    <i class="fas fa-times"></i>
                </button>

            </div>
            <div class="modal-body">
                <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <button type="submit" class="btn" id="updat">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



