@extends('layouts.app')

@section('content')
<!-- Header Section (Wohi banner image jo Facial mein thi) -->
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>Makeup Services</h1>
        <p>Enhance your natural beauty with our professional makeup artists.</p>
    </div>
</section>

<!-- Services Grid Section -->
<section class="services-page-section">
    <div class="container">
        <div class="services-page-grid">
            @foreach($services as $service)
                <div class="service-page-card">
                    <!-- Image -->
                    <div class="service-page-img">
                        <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->name }}">
                    </div>
                    
                    <!-- Content -->
                    <div class="service-page-content">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->short_description }}</p>
                        
                        <div class="service-meta">
                            <span class="price">Rs. {{ $service->price }}</span>
                            <span class="duration"><i class="fas fa-clock"></i> {{ $service->duration }} mins</span>
                        </div>

                        <a href="{{ route('services.makeup.detail', $service->slug) }}" class="btn-view-detail">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- =========================================
     WHY CHOOSE US SECTION (Makeup Content)
     ========================================= -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Why Choose Elegance?</span>
            <h2>Experience The Difference</h2>
        </div>

        <div class="why-choose-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-certificate"></i></div>
                <h3>Expert Artists</h3>
                <p>Our makeup artists are professionally trained and highly experienced in all makeup styles.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-leaf"></i></div>
                <h3>Premium Products</h3>
                <p>We use only top-tier branded products like MAC, Huda Beauty, and Charlotte Tilbury.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-spa"></i></div>
                <h3>Customized Looks</h3>
                <p>Every makeup look is tailored to your outfit, skin type, and event preference.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>Hygiene First</h3>
                <p>We maintain strict sanitization protocols and use sterilized brushes for every client.</p>
            </div>
        </div>
    </div>
</section>

<!-- =========================================
     CTA SECTION
     ========================================= -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="cta-title">Ready to Get Glamorous?</h2>
        <p class="cta-text">Book your professional makeup session today and let our artists enhance your beauty!</p>
        <a href="#appointment" class="btn-cta">Book Your Appointment <i class="fas fa-arrow-right"></i></a>
    </div>
</section>
<!-- =========================================
     MEET OUR EXPERTS (Dynamic)
     ========================================= -->
<section class="experts-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Meet Our Team</span>
            <h2>Our Makeup Experts</h2>
        </div>

        <div class="experts-grid">
            @forelse($experts as $expert)
                <div class="expert-card">
                    <div class="expert-img">
                        @if($expert->profile_image)
                            <img src="{{ asset('images/staff/' . $expert->profile_image) }}" alt="{{ $expert->user->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $expert->user->name }}&background=F8BBD0&color=590019&size=300" alt="{{ $expert->user->name }}">
                        @endif
                    </div>
                    <div class="expert-content">
                        <h3>{{ $expert->user->name }}</h3>
                        <p class="specialty">{{ $expert->specialization }}</p>
                        
                        <div class="rating">
                            <!-- Filhal 5 stars dikha rahe hain, baad mein reviews se aayega -->
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <span>({{ $expert->experience_years }} Yrs Exp)</span>
                        </div>

                        <a href="{{ route('services.makeup') }}?staff_id={{ $expert->user_id }}#appointment" class="btn-book-expert">Book with {{ explode(' ', $expert->user->name)[0] }}</a>
                    </div>
                </div>
            @empty
                <p class="text-center" style="grid-column: 1 / -1; color: #666;">No experts available in this category yet.</p>
            @endforelse
        </div>
        <!-- View All Staff Button -->
        <div class="text-center" style="margin-top: 40px;">
            <a href="{{ route('our-staff') }}" class="btn-view-all-staff">View All Staff</a>
        </div>

    </div>
</section>
<!-- =========================================
     FAQ SECTION
     ========================================= -->
<section class="faq-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Got Questions?</span>
            <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-container">
            <details class="faq-item">
                <summary>How long does the makeup last?</summary>
                <p>Our premium products ensure your makeup lasts up to 12 hours without fading.</p>
            </details>
            <details class="faq-item">
                <summary>Do you provide false lashes?</summary>
                <p>Yes, premium quality false lashes are included in our party and glam makeup packages.</p>
            </details>
            <details class="faq-item">
                <summary>Can I bring my own reference pictures?</summary>
                <p>Absolutely! Our artists love to recreate looks. You can show us any inspiration picture.</p>
            </details>
            <details class="faq-item">
                <summary>Is there a trial session available?</summary>
                <p>Yes, we offer trial sessions for engagement and special event makeup upon request.</p>
            </details>
        </div>
    </div>
</section>


<!-- =========================================
     BEFORE & AFTER RESULTS SECTION (4 Cards as requested)
     ========================================= -->
<section class="results-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Our Masterpieces</span>
            <h2>Makeup Transformations</h2>
            <p class="section-desc">See the magic our artists create for our clients.</p>
        </div>

        <div class="results-grid" style="grid-template-columns: repeat(2, 1fr);"> 
            <!-- Result 1 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/makeup/make-result-1.jpg') }}" alt="Party Makeup Result">
                </div>
                <div class="result-content">
                    <h3>Glamorous Party Look</h3>
                    <p>Bold eyes and flawless base.</p>
                </div>
            </div>

            <!-- Result 2 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/makeup/make-result-2.jpg') }}" alt="Engagement Makeup Result">
                </div>
                <div class="result-content">
                    <h3>Soft Engagement Look</h3>
                    <p>Elegant and natural finish.</p>
                </div>
            </div>

            <!-- Result 3 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/makeup/make-result-3.avif') }}" alt="Smokey Eye Makeup Result">
                </div>
                <div class="result-content">
                    <h3>Smokey Eye Glam</h3>
                    <p>Dramatic and bold eye makeup.</p>
                </div>
            </div>

            <!-- Result 4 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/makeup/make-result-4.jfif') }}" alt="Photoshoot Makeup Result">
                </div>
                <div class="result-content">
                    <h3>HD Photoshoot Look</h3>
                    <p>Camera-ready perfection.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- =========================================
     APPOINTMENT BOOKING FORM
     ========================================= -->
<section class="appointment-section" id="appointment">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-ap">Book Now</span>
            <h2 class="title-ap"  >Schedule Your Appointment</h2>
        </div>

    

        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @auth
            <div class="appointment-card">
                <form action="{{ route('appointment.store') }}" method="POST" class="appointment-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Select Service</label>
                            <select name="service_id" required>
                                <option value="">Choose a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }} (Rs. {{ $service->price }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Staff</label>
                            <select name="staff_id" required>
                                <option value="">Choose an expert</option>
                                <!-- Makeup experts yahan show honge -->
                                @foreach(App\Models\User::where('role', 'staff')->get() as $staff)
                                    <option value="{{ $staff->id }}" 
                                        {{ (request()->query('staff_id') == $staff->id) ? 'selected' : '' }}>
                                        {{ $staff->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date" required>
                        </div>
                        <div class="form-group">
                            <label>Preferred Time</label>
                            <input type="time" name="appointment_time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Additional Notes (Optional)</label>
                        <textarea name="notes" rows="3" placeholder="Any special requests?"></textarea>
                    </div>

                    <button type="submit" class="btn-submit-appointment">Book Appointment</button>
                </form>
            </div>
        @else
            <div class="login-prompt-card text-center">
                <div class="icon-box"><i class="fas fa-lock"></i></div>
                <h3>Login Required</h3>
                <p>To book an appointment, please login to your Elegance account. If you don't have one, you can register quickly!</p>
                <a href="{{ route('login') }}" class="btn-primary-pink" style="padding: 12px 35px; font-size: 16px;">Login to Book Appointment</a>
            </div>
        @endauth
    </div>
</section>



<script>
document.getElementById('appointment_date').addEventListener('change', function() {
    let selectedDate = this.value;
    let staffId = document.querySelector('select[name="staff_id"]').value;
    
    if (selectedDate && staffId) {
        fetch(`/check-staff-availability?staff_id=${staffId}&date=${selectedDate}`)
        .then(response => response.json())
        .then(data => {
            let errorMsg = document.getElementById('date-error-msg');
            let submitBtn = document.querySelector('.btn-submit-appointment');
            if (data.unavailable) {
                errorMsg.style.display = 'block';
                submitBtn.disabled = true;
            } else {
                errorMsg.style.display = 'none';
                submitBtn.disabled = false;
            }
        });
    }
});
</script>
@endsection