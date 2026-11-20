
@extends('layouts.app')

@section('content')

<style>
.contact-page {
    font-family: 'Poppins', sans-serif;
    color: #2D1A1E;
    background: #FFF6F8;
}

/* HERO SECTION */
.contact-hero {
    min-height: 300px;
    background: linear-gradient(135deg, #590019, #C2185B);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 50px 20px;
    color: white;
}

.contact-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: 52px;
    margin-bottom: 12px;
}

.contact-hero p {
    font-size: 15px;
    letter-spacing: 1px;
}

/* MAIN CONTAINER */
.contact-main {
    max-width: 1200px;
    margin: auto;
    padding: 70px 25px;
}

.contact-heading {
    text-align: center;
    margin-bottom: 45px;
}

.contact-heading h2 {
    font-family: 'Playfair Display', serif;
    font-size: 36px;
    color: #590019;
    margin-bottom: 12px;
}

.contact-heading p {
    color: #76545F;
    font-size: 14px;
}

/* CONTACT CARDS */
.contact-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 60px;
}

.contact-card {
    background: #FFFFFF;
    padding: 30px 20px;
    text-align: center;
    border-radius: 14px;
    box-shadow: 0 5px 22px rgba(89, 0, 25, 0.07);
    border: 1px solid #F4DCE3;
    transition: 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 28px rgba(89, 0, 25, 0.12);
}

.contact-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 18px;
    border-radius: 50%;
    background: #FCE4EC;
    color: #A3154D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.contact-card h3 {
    color: #590019;
    font-size: 18px;
    margin-bottom: 10px;
}

.contact-card p {
    color: #76545F;
    font-size: 13px;
    line-height: 1.7;
}

/* CONTACT CONTENT */
.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 35px;
    align-items: stretch;
}

/* FORM */
.contact-form-box {
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 5px 22px rgba(89, 0, 25, 0.07);
    border: 1px solid #F4DCE3;
}

.contact-form-box h2,
.contact-map-box h2 {
    font-family: 'Playfair Display', serif;
    font-size: 29px;
    color: #590019;
    margin-bottom: 12px;
}

.contact-form-box .subtitle {
    color: #76545F;
    font-size: 13px;
    margin-bottom: 28px;
}

.contact-form .form-group {
    margin-bottom: 18px;
}

.contact-form label {
    display: block;
    color: #590019;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 13px 15px;
    border: 1px solid #E8C5D0;
    border-radius: 8px;
    background: #FFF9FB;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    outline: none;
    transition: 0.3s;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #C2185B;
    box-shadow: 0 0 0 3px rgba(194, 24, 91, 0.08);
}

.contact-form textarea {
    min-height: 125px;
    resize: vertical;
}

.contact-submit {
    width: 100%;
    padding: 14px;
    background: #590019;
    color: white;
    border: none;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.contact-submit:hover {
    background: #C2185B;
}

/* MAP */
.contact-map-box {
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 5px 22px rgba(89, 0, 25, 0.07);
    border: 1px solid #F4DCE3;
}

.contact-map-box p {
    color: #76545F;
    font-size: 13px;
    margin-bottom: 22px;
}

.contact-map {
    width: 100%;
    height: 390px;
    border: none;
    border-radius: 10px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .contact-hero {
        min-height: 230px;
    }

    .contact-hero h1 {
        font-size: 38px;
    }

    .contact-main {
        padding: 45px 18px;
    }

    .contact-heading h2 {
        font-size: 29px;
    }

    .contact-cards {
        grid-template-columns: 1fr;
    }

    .contact-content {
        grid-template-columns: 1fr;
    }

    .contact-form-box,
    .contact-map-box {
        padding: 25px 20px;
    }
}
</style>

<div class="contact-page">

    <!-- HERO -->
    <section class="contact-hero">
        <div>
            <h1>Contact Us</h1>
            <p>WE WOULD LOVE TO HEAR FROM YOU</p>
        </div>
    </section>

    <main class="contact-main">

        <!-- HEADING -->
        <div class="contact-heading">
            <h2>Get In Touch</h2>
            <p>Have a question or need assistance? We are here to help you.</p>
        </div>

        <!-- CONTACT CARDS -->
        <div class="contact-cards">

            <div class="contact-card">
                <div class="contact-icon">☎</div>
                <h3>Call Us</h3>
                <p>Contact our salon for appointments and inquiries.</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">✉</div>
                <h3>Email Us</h3>
                <p>Send us your questions and we will get back to you.</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">⌖</div>
                <h3>Visit Us</h3>
                <p>Visit Elegance Salon and enjoy our beauty services.</p>
            </div>

        </div>

        <!-- FORM AND MAP -->
        <div class="contact-content">

            <!-- CONTACT FORM -->
            <div class="contact-form-box">
                <h2>Send Us a Message</h2>
                <p class="subtitle">
                    Fill out the form below and get in touch with our team.
                </p>

                <form class="contact-form">

                    <div class="form-group">
                        <label for="contact-name">Full Name</label>
                        <input type="text" id="contact-name"
                               placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-email">Email Address</label>
                        <input type="email" id="contact-email"
                               placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-phone">Phone Number</label>
                        <input type="tel" id="contact-phone"
                               placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Your Message</label>
                        <textarea id="contact-message"
                                  placeholder="Write your message here..."
                                  required></textarea>
                    </div>

                    <button type="submit" class="contact-submit">
                        Send Message
                    </button>

                </form>
            </div>

            <!-- MAP -->
            <div class="contact-map-box">
                <h2>Find Our Salon</h2>
                <p>We look forward to welcoming you to Elegance Salon.</p>

                <iframe
                    class="contact-map"
                    src="https://www.google.com/maps?q=Tariq+Road+Karachi&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>
            </div>

        </div>

    </main>

</div>

@endsection
