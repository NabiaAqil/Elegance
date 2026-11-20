@extends('layouts.app')

@section('content')
<section class="dashboard-section">
    <div class="container">
        
        <!-- Header -->
        <div class="profile-page-header">
            <div class="user-info">
                <div class="user-avatar"><i class="fas fa-user-edit"></i></div>
                <div>
                    <h2>Edit Your Profile</h2>
                    <p>Update your professional details for clients.</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('staff.dashboard') }}" class="btn-outline-dark">Back to Dashboard</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Main Layout: Left Preview + Right Form -->
        <div class="profile-layout-wrapper">
            
            <!-- LEFT SIDE: Profile Preview Card -->
            <div class="profile-preview-card">
                <div class="preview-img-wrapper">
                    @if($profile->profile_image)
                        <img src="{{ asset('images/staff/' . $profile->profile_image) }}" alt="Profile" id="profile-preview-img">
                    @else
                        <!-- Default Initials (SK) -->
                        <div class="initials-avatar" id="initials-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1)) }}
                        </div>
                        <img src="" alt="Profile" id="profile-preview-img" style="display: none;">
                    @endif
                </div>
                <h3>{{ Auth::user()->name }}</h3>
                <p class="preview-role">{{ $profile->specialization ?? 'Staff Member' }}</p>
                <p class="preview-exp">{{ $profile->experience_years ?? '0' }} Years Experience</p>
            </div>

            <!-- RIGHT SIDE: Edit Form -->
            <div class="profile-form-card">
                <form action="{{ route('staff.profile.update') }}" method="POST" enctype="multipart/form-data" class="vertical-form">
                    @csrf
                    
                    <!-- Image Upload (Hidden by default) -->
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div class="file-upload-wrapper">
                            <label for="profile_image" class="custom-file-upload">
                                <i class="fas fa-camera"></i> Choose Photo
                            </label>
                            <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewImage(event)">
                            <span id="file-name" style="font-size: 13px; color: #666; margin-left: 10px;">No file chosen</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Specialization (Expertise Category)</label>
                        <select name="specialization" required>
                            <option value="">Select Category</option>
                            <option value="Facial & Skin Care" {{ $profile->specialization == 'Facial & Skin Care' ? 'selected' : '' }}>Facial & Skin Care</option>
                            <option value="Makeup Services" {{ $profile->specialization == 'Makeup Services' ? 'selected' : '' }}>Makeup Services</option>
                            <option value="Bridal Makeup" {{ $profile->specialization == 'Bridal Makeup' ? 'selected' : '' }}>Bridal Makeup</option>
                            <option value="Hair Styling & Care" {{ $profile->specialization == 'Hair Styling & Care' ? 'selected' : '' }}>Hair Styling & Care</option>
                            <option value="Manicure & Pedicure" {{ $profile->specialization == 'Manicure & Pedicure' ? 'selected' : '' }}>Manicure & Pedicure</option>
                            <option value="Spa & Relaxation" {{ $profile->specialization == 'Spa & Relaxation' ? 'selected' : '' }}>Spa & Relaxation</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Years of Experience</label>
                        <input type="number" name="experience_years" value="{{ $profile->experience_years }}" placeholder="e.g. 5" min="0">
                    </div>
<!-- YAHAN SE NAYA CODE ADD KAREIN -->
                    <div class="form-group">
    <label>Commission Rate (%)</label>
    <input type="number" name="commission_rate" value="{{ $profile->commission_rate ?? 10 }}" min="0.01" max="100" step="0.01" placeholder="e.g. 10">
</div>
                    <div class="form-group">
                        <label>Short Bio</label>
                        <textarea name="bio" rows="4" placeholder="Tell clients about your expertise...">{{ $profile->bio }}</textarea>
                    </div>

                    <button type="submit" class="btn-save-profile">Save Profile</button>
                </form>
            </div>

        </div>

    </div>
</section>

<!-- JavaScript for Image Preview -->
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('profile-preview-img');
        var initials = document.getElementById('initials-avatar');
        var fileName = document.getElementById('file-name');
        
        output.src = reader.result;
        output.style.display = 'block'; // Image show karein
        if(initials) initials.style.display = 'none'; // Initials hide karein
        
        fileName.textContent = event.target.files[0].name; // File name show karein
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection