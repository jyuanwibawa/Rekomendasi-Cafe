
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Your Profile</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <p id="fullname">{{ $user->fullname }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <p id="username">{{ $user->username }}</p>
                    </div>

                    <!-- Display the user's email if available -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <p id="email">{{ $user->email ?? 'Email not provided' }}</p>
                    </div>

                    <!-- Display the user's role (optional) -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <p id="role">{{ $user->role }}</p>
                    </div>

                    <!-- Add a button for users to edit their profile (optional) -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

