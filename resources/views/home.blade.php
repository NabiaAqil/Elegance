@extends('layouts.app')

@section('content')

    @include('partials.banner')

    <section class="services-section" id="services">
        <div class="container">
            
            <div class="section-title text-center">
                <span class="sub-title">Our Signature Services</span>
                <h2>Indulge in a range of premium <br> beauty services</h2>
            </div>
            
            <div class="services-grid">
    <!-- Service 1 -->
    <a href="{{ route('services.facial') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-spa"></i>
        </div>
        <h3>Facial & <br> Skin Care</h3>
    </a>

    <!-- Service 2 -->
    <a href="{{ route('services.makeup') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-brush"></i>
        </div>
        <h3>Makeup <br> Services</h3>
    </a>

    <!-- Service 3 -->
    <a href="{{ route('services.hair') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-cut"></i>
        </div>
        <h3>Hair Styling & <br> Hair Care</h3>
    </a>

    <!-- Service 4 -->
    <a href="{{ route('services.manicure-pedicure') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-hand-sparkles"></i>
        </div>
        <h3>Manicure & <br> Pedicure</h3>
    </a>

    <!-- Service 5 -->
    <a href="{{ route('services.bridal') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-solid fa-splotch"></i>
        </div>
        <h3>Bridal <br> Makeup</h3>
    </a>

    <!-- Service 6 -->
    <a href="{{ route('services.spa') }}" class="service-card">
        <div class="service-icon">
            <i class="fas fa-leaf"></i>
        </div>
        <h3>Spa & <br> Relaxation</h3>
    </a>
</div>
        </div>
    </section>



<section class="why-choose-section">
    <div class="container">

        <div class="section-title text-center">
            <span class="sub-title">Why Elegance Salon</span>
            <h2>Experience Beauty with <br> Confidence & Care</h2>
            <p>
                Discover the difference with our professional care,
                premium products and relaxing salon experience.
            </p>
        </div>

        <div class="why-choose-grid">

            <div class="why-choose-card">
                <div class="why-image">
                    <img src="{{ asset('images/choose1.jfif') }}"
                         alt="Expert Beauty Professionals">
                </div>
                <div class="why-card-content">
                    <h3>Expert Professionals</h3>
                    <p>
                        Our skilled beauty professionals deliver
                        every service with care and attention.
                    </p>
                </div>
            </div>

            <div class="why-choose-card">
                <div class="why-image">
                    <img src="{{ asset('images/choose2.jfif') }}"
                         alt="Premium Beauty Products">
                </div>
                <div class="why-card-content">
                    <h3>Premium Products</h3>
                    <p>
                        We carefully select quality products
                        for a wonderful beauty experience.
                    </p>
                </div>
            </div>

            <div class="why-choose-card">
                <div class="why-image">
                    <img src="{{ asset('images/choose3.jfif') }}"
                         alt="Personalized Beauty Care">
                </div>
                <div class="why-card-content">
                    <h3>Personalized Care</h3>
                    <p>
                        Every treatment is tailored to your
                        preferences and beauty needs.
                    </p>
                </div>
            </div>

            <div class="why-choose-card">
                <div class="why-image">
                    <img src="{{ asset('images/choose4.jfif') }}"
                         alt="Relaxing Salon Environment">
                </div>
                <div class="why-card-content">
                    <h3>Relaxing Environment</h3>
                    <p>
                        Enjoy a welcoming and comfortable
                        atmosphere during every visit.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="popular-services-section">
    <div class="container">

        <div class="section-title text-center">
            <span class="sub-title">Our Most Loved Treatments</span>
            <h2>Popular Beauty Services</h2>
            <p>
                Explore our most loved beauty treatments,
                designed to make every visit special.
            </p>
        </div>

        <div class="popular-services-grid">

            <div class="popular-service-card">
                <div class="popular-service-image">
                    <img src="{{ asset('images/main2.jfif') }}"
                         alt="Facial and Skin Care">
                </div>
                <div class="popular-service-content">
                    <h3>Facial & Skin Care</h3>
                    <p>Refresh your skin with our relaxing facial treatments.</p>
                    <a href="{{ route('services.facial') }}">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="popular-service-card">
                <div class="popular-service-image">
                    <img src="{{ asset('images/main1.jfif') }}"
                         alt="Professional Makeup">
                </div>
                <div class="popular-service-content">
                    <h3>Makeup Services</h3>
                    <p>Get a beautiful look for your special occasions.</p>
                    <a href="{{ route('services.makeup') }}">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="popular-service-card">
                <div class="popular-service-image">
                    <img src="{{ asset('images/main3.jfif') }}"
                         alt="Hair Styling">
                </div>
                <div class="popular-service-content">
                    <h3>Hair Styling</h3>
                    <p>Discover beautiful hairstyles and professional hair care.</p>
                    <a href="{{ route('services.hair') }}">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="popular-service-card">
                <div class="popular-service-image">
                    <img src="{{ asset('images/main4.jpg') }}"
                         alt="Bridal Makeup">
                </div>
                <div class="popular-service-content">
                    <h3>Bridal Makeup</h3>
                    <p>Celebrate your special day with an elegant bridal look.</p>
                    <a href="{{ route('services.bridal') }}">Explore Service <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="customer-reviews-section">
    <div class="container">

        <div class="section-title text-center">
            <span class="sub-title">Client Testimonials</span>
            <h2>What Our Customers Say</h2>
            <p>Real experiences and feedback from our valued customers.</p>
        </div>

        <div class="customer-reviews-grid">

            @forelse($reviews ?? [] as $review)

                <div class="customer-review-card">

                    <div class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? 'active' : '' }}"></i>
                        @endfor
                    </div>

                    <p class="review-comment">
                        "{{ $review->comment ?: 'Had a wonderful experience at Elegance Salon.' }}"
                    </p>

                    <div class="review-customer">
                        <div class="review-avatar">
                            <i class="fas fa-user"></i>
                        </div>

                        <div>
                            <h4>{{ $review->customer->name ?? 'Customer' }}</h4>
                            <span>{{ $review->service->name ?? 'Salon Service' }}</span>
                        </div>
                    </div>

                </div>

            @empty

                <div class="no-reviews">
                    <i class="fas fa-comments"></i>
                    <p>Customer reviews will appear here soon.</p>
                </div>

            @endforelse

        </div>
    </div>
</section>



<section class="home-faq-section">
    <div class="container">

        <div class="section-title text-center">
            <span class="sub-title">Got Questions?</span>
            <h2>Frequently Asked Questions</h2>
            <p>Everything you need to know about Elegance Salon.</p>
        </div>

        <div class="faq-container">

            <div class="faq-item">
                <button class="faq-question" type="button">
                    What services does Elegance Salon offer?
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        We offer facial and skincare, makeup, hair styling,
                        manicure and pedicure, bridal makeup, and spa services.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button">
                    How can I book an appointment?
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        You can book an appointment through our website
                        by selecting your preferred service, date and time.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button">
                    Can I choose my preferred staff member?
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Yes, you can select an available staff member
                        while booking your appointment.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button">
                    Can I cancel or reschedule my appointment?
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Yes, you can manage your appointment through
                        your customer dashboard, according to salon policies.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" type="button">
                    How can I share my experience with the salon?
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        After your appointment is completed, you can
                        submit a rating and review through your customer dashboard.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', function () {

        const currentItem = this.parentElement;
        const answer = currentItem.querySelector('.faq-answer');

        document.querySelectorAll('.faq-item').forEach(item => {
            if (item !== currentItem) {
                item.classList.remove('active');
                item.querySelector('.faq-answer').style.maxHeight = null;
            }
        });

        currentItem.classList.toggle('active');

        if (currentItem.classList.contains('active')) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
        } else {
            answer.style.maxHeight = null;
        }
    });
});
</script>


<section class="home-cta-section">
    <div class="container">

        <div class="home-cta-content">

            <span class="cta-subtitle">Your Beauty Journey Starts Here</span>

            <h2>Ready to Experience <br> the Elegance?</h2>

            <p>
                Treat yourself to the care and attention you deserve.
                Book your appointment today and let us make you feel special.
            </p>

            <a href="{{ route('book-appointment') }}" class="btn-primary-pink">
                Book Your Appointment
                <i class="fas fa-arrow-right"></i>
            </a>

        </div>

    </div>
</section>




<section class="about-home-section">
    <div class="container">

        <div class="about-home-wrapper">

            <div class="about-home-image">
                <img src="{{ asset('images/log2.png') }}"
                     alt="Elegance Salon Interior">
                <div class="about-image-label">
                    <span>Elegance Salon</span>
                    <small>Beauty • Care • Confidence</small>
                </div>
            </div>

            <div class="about-home-content">

                <span class="sub-title">A Little About Us</span>

                <h2>Where Beauty Meets Elegance</h2>

                <p>
                    Welcome to Elegance Salon, your destination for
                    beauty, relaxation and self-care. We believe that
                    every individual deserves to feel confident and
                    beautiful.
                </p>

                <p>
                    From skincare and makeup to hair styling and bridal
                    services, we are dedicated to providing a welcoming
                    experience with professional care and attention.
                </p>

                <div class="about-home-points">
                    <div>
                        <i class="fas fa-check-circle"></i>
                        Professional Beauty Care
                    </div>

                    <div>
                        <i class="fas fa-check-circle"></i>
                        Quality Beauty Products
                    </div>

                    <div>
                        <i class="fas fa-check-circle"></i>
                        Customer Satisfaction
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="btn-primary-pink">
                    Contact Us
                </a>

            </div>

        </div>
    </div>
</section>











@endsection