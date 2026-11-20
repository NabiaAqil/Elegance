@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>Facial & Skin Care</h1>
        <p>Reveal your natural glow with our premium treatments.</p>
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

                        <!-- Detail Page ka Button (Filhal # hai) -->
                        <a href="{{ route('services.facial.detail', $service->slug) }}" class="btn-view-detail">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- =========================================
     CALL TO ACTION (CTA) SECTION
     ========================================= -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="cta-title">Ready to Reveal Your Natural Glow?</h2>
        <p class="cta-text">Book your personalized facial treatment today and let our experts pamper you. Experience the Elegance difference!</p>
        <a href="#appointment" class="btn-cta">Book Your Appointment <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- =========================================
     WHY CHOOSE US SECTION
     ========================================= -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Why Choose Elegance?</span>
            <h2>Experience The Difference</h2>
        </div>

        <div class="why-choose-grid">
            <!-- Feature 1 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Certified Experts</h3>
                <p>Our therapists are professionally trained and highly experienced in advanced skin care.</p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Premium Products</h3>
                <p>We use only top-tier branded products like Casmara, O3+, and Thalgo for safe results.</p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <h3>Customized Care</h3>
                <p>Every treatment is tailored to your specific skin type, concerns, and preferences.</p>
            </div>

            <!-- Feature 4 -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Hygiene First</h3>
                <p>We maintain strict sanitization protocols and use sterilized tools for every client.</p>
            </div>
        </div>
    </div>
</section>

<!-- =========================================
     BEFORE & AFTER RESULTS SECTION
     ========================================= -->
<section class="results-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Real Results</span>
            <h2>See The Elegance Transformation</h2>
            <p class="section-desc">Witness the visible difference our premium treatments make.</p>
        </div>

                <div class="results-grid">
            
            <!-- Result 1 -->
            <div class="result-card">
                <!-- Ek hi image jisme before aur after dono hain -->
                <div class="result-image-single">
                    <img src="{{ asset('images/facial/aa1.jfif') }}" alt="Before and After HydraFacial">
                </div>
                <div class="result-content">
                    <h3>HydraFacial Glow</h3>
                    <p>Deep hydration & blackhead removal.</p>
                </div>
            </div>

            <!-- Result 2 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/facial/acne1.jfif') }}" alt="Before and After Acne Treatment">
                </div>
                <div class="result-content">
                    <h3>Acne Clear Treatment</h3>
                    <p>Reduced acne & smoother skin texture.</p>
                </div>
            </div>

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
            
            <!-- FAQ 1 -->
            <details class="faq-item">
                <summary>How often should I get a facial?</summary>
                <p>For best results, we recommend getting a facial every 4 to 6 weeks, depending on your skin type and concerns.</p>
            </details>

            <!-- FAQ 2 -->
            <details class="faq-item">
                <summary>Is a facial safe for sensitive skin?</summary>
                <p>Absolutely. We customize every treatment after a skin analysis to ensure it's safe and suitable for your specific skin type.</p>
            </details>

            <!-- FAQ 3 -->
            <details class="faq-item">
                <summary>Can I wear makeup after a facial?</summary>
                <p>It's best to let your skin breathe for at least 4-6 hours after a facial. We recommend avoiding heavy makeup immediately.</p>
            </details>

            <!-- FAQ 4 -->
            <details class="faq-item">
                <summary>How long does a facial treatment take?</summary>
                <p>Our treatments usually take between 60 to 90 minutes, depending on the specific service you choose.</p>
            </details>

            <!-- FAQ 5 -->
            <details class="faq-item">
                <summary>Do you use branded products?</summary>
                <p>Yes, we only use premium, dermatologist-tested brands like Casmara, O3+, and Thalgo for safe and effective results.</p>
            </details>

        </div>
    </div>
</section>

<!-- =========================================
     MEET OUR EXPERTS (Dynamic)
     ========================================= -->
<section class="experts-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Meet Our Team</span>
            <h2>Our Facial Experts</h2>
        </div>

        <div class="experts-grid">
            @forelse($experts as $expert)
                <div class="expert-card">
                    <div class="expert-img">
                        @if($expert->profile_image)
                            <img src="{{ asset('images/staff/' . $expert->profile_image) }}" alt="{{ $expert->user->name }}">
                        @else
                            <!-- Agar picture nahi hai toh default avatar -->
                            <img src="https://ui-avatars.com/api/?name={{ $expert->user->name }}&background=F8BBD0&color=590019&size=300" alt="{{ $expert->user->name }}">
                        @endif
                    </div>
                    <div class="expert-content">
                        <h3>{{ $expert->user->name }}</h3>
                        <p class="specialty">{{ $expert->specialization }}</p>
                        
                        <div class="rating">
    @php
        $rating = $expert->rating ?? 0; // Database se rating uthayen
        $fullStars = floor($rating); // Kitne poore stars hain (jaise 4.5 mein 4)
        $halfStar = ($rating - $fullStars) >= 0.5; // Aadha star hai ya nahi
    @endphp

    {{-- Poore Stars --}}
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $fullStars)
            <i class="fas fa-star" style="color: var(--champagne-gold);"></i>
        @elseif ($i == $fullStars + 1 && $halfStar)
            <i class="fas fa-star-half-alt" style="color: var(--champagne-gold);"></i>
        @else
            <i class="far fa-star" style="color: #ccc;"></i> {{-- Khali star --}}
        @endif
    @endfor

    <span>({{ $expert->experience_years }} Yrs Exp)</span>
</div>

                        <a href="{{ route('services.facial') }}?staff_id={{ $expert->user_id }}#appointment" class="btn-book-expert">Book with {{ explode(' ', $expert->user->name)[0] }}</a>
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
     APPOINTMENT BOOKING SECTION
     ========================================= -->

          

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

<section class="appointment-section" id="appointment">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-ap">Book Now</span>
            <h2 class="sub-title-ap"  >Schedule Your Appointment</h2>
        </div>

        @auth
            <!-- ================= LOGGED IN USER KE LIYE FORM ================= -->
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
            <!-- ================= GUEST (BINA LOGIN) KE LIYE MESSAGE ================= -->
            <div class="login-prompt-card text-center">
                <div class="icon-box">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Login Required</h3>
                <p>To book an appointment, please login to your Elegance account. If you don't have one, you can register quickly!</p>
                
                <!-- Yahan Login Button hai jo aapke custom login page par le jayega -->
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
        // AJAX Request (baad mein banayenge)
        fetch(`/check-staff-availability?staff_id=${staffId}&date=${selectedDate}`)
        .then(response => response.json())
        .then(data => {
            let errorMsg = document.getElementById('date-error-msg');
            let submitBtn = document.querySelector('.btn-submit-appointment');
            
            if (data.unavailable) {
                errorMsg.style.display = 'block'; // Error dikhao
                submitBtn.disabled = true; // Button band kar do
            } else {
                errorMsg.style.display = 'none'; // Error chhupao
                submitBtn.disabled = false;
            }
        });
    }
});
</script>


@endsection