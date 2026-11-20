@extends('layouts.app')

@section('content')
<!-- Header Section (Wohi banner image) -->
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>Manicure & Pedicure</h1>
        <p>Pamper your hands and feet with our premium nail care services.</p>
    </div>
</section>

<!-- 1. Services Grid Section (6 Cards) -->
<section class="services-page-section">
    <div class="container">
        <div class="services-page-grid">
            @foreach($services as $service)
                <div class="service-page-card">
                    <div class="service-page-img">
                        <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->name }}">
                    </div>
                    <div class="service-page-content">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->short_description }}</p>
                        <div class="service-meta">
                            <span class="price">Rs. {{ $service->price }}</span>
                            <span class="duration"><i class="fas fa-clock"></i> {{ $service->duration }} mins</span>
                        </div>
                        <a href="{{ route('services.manicure-pedicure.detail', $service->slug) }}" class="btn-view-detail">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 2. CTA SECTION (Aapne yahan chaha tha) -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="cta-title">Ready for Beautiful Nails?</h2>
        <p class="cta-text">Book your appointment today and let our experts pamper your hands and feet!</p>
        <a href="#appointment" class="btn-cta">Book Your Appointment <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<!-- 3. WHY CHOOSE US SECTION -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Why Choose Elegance?</span>
            <h2>Experience The Difference</h2>
        </div>
        <div class="why-choose-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-hand-sparkles"></i></div>
                <h3>Expert Nail Technicians</h3>
                <p>Our technicians are trained in the latest nail art and extension techniques.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-leaf"></i></div>
                <h3>Premium Products</h3>
                <p>We use only top-tier brands like OPI, CND, and Gelish for safe results.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-magic"></i></div>
                <h3>Custom Designs</h3>
                <p>We create custom nail art designs to match your style and occasion.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>Hygiene First</h3>
                <p>We maintain strict sanitization protocols and use sterilized tools.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. RESULTS SECTION (Nail Art Gallery - 4 Cards) -->
<section class="results-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Our Masterpieces</span>
            <h2>Nail Transformations</h2>
            <p class="section-desc">See the stunning nail art our experts create.</p>
        </div>

        <div class="results-grid" style="grid-template-columns: repeat(2, 1fr);"> 
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/nails/nr1.jfif') }}" alt="Gel Extensions">
                </div>
                <div class="result-content">
                    <h3>Gel Extensions</h3>
                    <p>Long-lasting and natural-looking.</p>
                </div>
            </div>
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/nails/nr2.jfif') }}" alt="Custom Nail Art">
                </div>
                <div class="result-content">
                    <h3>Custom Nail Art</h3>
                    <p>Hand-painted designs.</p>
                </div>
            </div>
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/nails/nr3.jfif') }}" alt="Acrylic Nails">
                </div>
                <div class="result-content">
                    <h3>Acrylic Nails</h3>
                    <p>Strong and durable.</p>
                </div>
            </div>
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/nails/nr4.jfif') }}" alt="Spa Pedicure">
                </div>
                <div class="result-content">
                    <h3>Spa Pedicure</h3>
                    <p>Relaxing and nourishing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. FAQ SECTION -->
<section class="faq-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Got Questions?</span>
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-container">
            <details class="faq-item">
                <summary>How long do gel extensions last?</summary>
                <p>Gel extensions typically last 2-3 weeks before needing a fill or removal.</p>
            </details>
            <details class="faq-item">
                <summary>Are acrylic nails safe?</summary>
                <p>Yes, when applied and removed by a professional, acrylic nails are safe.</p>
            </details>
            <details class="faq-item">
                <summary>Can I get custom nail art?</summary>
                <p>Absolutely! We specialize in custom designs tailored to your preference.</p>
            </details>
            <details class="faq-item">
                <summary>How often should I get a pedicure?</summary>
                <p>We recommend a pedicure every 4-6 weeks for optimal foot health.</p>
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
            <h2>Our Nail Experts</h2>
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
                            <!-- Filhal 5 stars dikha rahe hain, baad mein reviews se aayega -->
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <span>({{ $expert->experience_years }} Yrs Exp)</span>
                        </div>

                        <a href="{{ route('services.manicure-pedicure') }}?staff_id={{ $expert->user_id }}#appointment" class="btn-book-expert">Book with {{ explode(' ', $expert->user->name)[0] }}</a>
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



<!-- 7. APPOINTMENT BOOKING FORM -->
<section class="appointment-section" id="appointment">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-ap">Book Now</span>
            <h2  class="title-ap" >Schedule Your Appointment</h2>
        </div>
      
        @if($errors->any())
            <div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        
        @auth
            <div class="appointment-card">
                <form action="{{ route('appointment.store') }}" method="POST" class="appointment-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group"><label>Your Name</label><input type="text" name="name" value="{{ Auth::user()->name }}" required></div>
                        <div class="form-group"><label>Phone Number</label><input type="text" name="phone" placeholder="Enter your phone number" required></div>
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
                                    <option value="{{ $staff->id }}" {{ (request()->query('staff_id') == $staff->id) ? 'selected' : '' }}>{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group"><label>Appointment Date</label><input type="date" name="appointment_date" id="appointment_date" required></div>
                        <div class="form-group"><label>Preferred Time</label><input type="time" name="appointment_time" required></div>
                    </div>
                    <div class="form-group"><label>Additional Notes (Optional)</label><textarea name="notes" rows="3" placeholder="Any special requests?"></textarea></div>
                    
                    <div id="date-error-msg" style="display: none; color: red; font-weight: 600; margin-bottom: 15px; text-align: center;">
                        This staff member is not available on the selected date. Please choose another date.
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

<!-- JavaScript for Availability Check -->
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