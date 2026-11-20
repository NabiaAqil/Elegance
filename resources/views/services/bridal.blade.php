@extends('layouts.app')

@section('content')
<!-- Header Section (Wohi banner image jo Facial/Makeup mein thi) -->
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>Bridal Makeup</h1>
        <p>Making your special day unforgettable with our luxurious bridal looks.</p>
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

                        <a href="{{ route('services.bridal.detail', $service->slug) }}" class="btn-view-detail">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- =========================================
     CTA SECTION
     ========================================= -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="cta-title">Ready to Be a Stunning Bride?</h2>
        <p class="cta-text">Book your bridal consultation today and let us create the look of your dreams!</p>
        <a href="#appointment" class="btn-cta">Book Your Appointment <i class="fas fa-arrow-right"></i></a>
    </div>
</section>
<!-- =========================================
     WHY CHOOSE US SECTION (Bridal Content)
     ========================================= -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Why Choose Elegance?</span>
            <h2>Experience The Difference</h2>
        </div>

        <div class="why-choose-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-crown"></i></div>
                <h3>Signature Bridal Looks</h3>
                <p>We create customized bridal looks that perfectly match your outfit and jewelry.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-gem"></i></div>
                <h3>Luxury Products</h3>
                <p>Only premium brands like Chanel, Dior, and Charlotte Tilbury for your big day.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-user-tie"></i></div>
                <h3>Expert Bridal Artists</h3>
                <p>Our senior artists have years of experience handling bridal stress and timelines.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-clock"></i></div>
                <h3>On-Time Service</h3>
                <p>We value your time and ensure you are ready well before your events.</p>
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
            <details class="faq-item">
                <summary>How many days in advance should I book my bridal makeup?</summary>
                <p>We recommend booking at least 1-2 months in advance, especially during wedding season.</p>
            </details>
            <details class="faq-item">
                <summary>Do you offer a trial session for brides?</summary>
                <p>Yes, we highly recommend a trial session to finalize your look and test product compatibility.</p>
            </details>
            <details class="faq-item">
                <summary>Do you travel to the wedding venue?</summary>
                <p>Yes, our team can travel to your home or venue. Travel charges may apply based on distance.</p>
            </details>
            <details class="faq-item">
                <summary>What is included in the bridal package?</summary>
                <p>Our packages include makeup, hair styling, draping, and premium lashes. Details vary by package.</p>
            </details>
        </div>
    </div>
</section>



<!-- =========================================
     BEFORE & AFTER RESULTS SECTION (4 Cards)
     ========================================= -->
<section class="results-section">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title">Our Bridal Masterpieces</span>
            <h2>Bridal Transformations</h2>
            <p class="section-desc">See the magic our artists create for our real brides.</p>
        </div>

        <div class="results-grid" style="grid-template-columns: repeat(2, 1fr);"> 
            <!-- Result 1 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/bridal/br1.jpg') }}" alt="Bridal Look 1">
                </div>
                <div class="result-content">
                    <h3>Classic Red Bride</h3>
                    <p>Timeless elegance with traditional red.</p>
                </div>
            </div>

            <!-- Result 2 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/bridal/br2.jpg') }}" alt="Bridal Look 2">
                </div>
                <div class="result-content">
                    <h3>Pastel Nikkah Bride</h3>
                    <p>Soft, glowing look for the Nikkah ceremony.</p>
                </div>
            </div>

            <!-- Result 3 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/bridal/br3.jpg') }}" alt="Bridal Look 3">
                </div>
                <div class="result-content">
                    <h3>HD Walima Look</h3>
                    <p>Flawless HD base for the reception.</p>
                </div>
            </div>

            <!-- Result 4 -->
            <div class="result-card">
                <div class="result-image-single">
                    <img src="{{ asset('images/bridal/br4.jfif') }}" alt="Bridal Look 4">
                </div>
                <div class="result-content">
                    <h3>Signature Luxury Bride</h3>
                    <p>Our premium signature look.</p>
                </div>
            </div>
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
            <h2>Our Bridal Makeup Experts</h2>
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
<a href="{{ route('services.bridal') }}?staff_id={{ $expert->user_id }}#appointment" class="btn-book-expert">
    Book with {{ explode(' ', $expert->user->name)[0] }}
</a>
                        
                    </div>
                </div>
            @empty
                <p class="text-center" style="grid-column: 1 / -1; color: #666;">No experts available in this category yet.</p>
            @endforelse
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
            <h2 class="title-ap" >Schedule Your Appointment</h2>
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