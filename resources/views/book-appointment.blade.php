@extends('layouts.app')

@section('content')

<section class="appointment-section" id="appointment"
style="padding-top: 150px;">

    <div class="container">

        <div class="section-title-ap text-center">
            <span class="sub-title-ap">Book Now</span>
            <h2 class="sub-title-ap">Schedule Your Appointment</h2>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        {{-- VALIDATION ERRORS --}}
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

                <form
                    action="{{ route('appointment.store') }}"
                    method="POST"
                    class="appointment-form"
                >

                    @csrf


                    {{-- NAME AND PHONE --}}
                    <div class="form-row">

                        <div class="form-group">

                            <label>Your Name</label>

                            <input
                                type="text"
                                name="name"
                                value="{{ Auth::user()->name }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>Phone Number</label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                placeholder="Enter your phone number"
                                required
                            >

                        </div>

                    </div>


                    {{-- SERVICE AND STAFF --}}
                    <div class="form-row">

                        {{-- SERVICE DROPDOWN --}}
                        <div class="form-group">

                            <label>Select Service</label>

                            <select
                                name="service_id"
                                id="service-select"
                                required
                            >

                                <option value="">Choose a service</option>

                                @foreach($services as $service)

                                    <option
                                        value="{{ $service->id }}"
                                        {{ old('service_id') == $service->id ? 'selected' : '' }}
                                    >
                                        {{ $service->name }}
                                        (Rs. {{ $service->price }})
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- STAFF DROPDOWN --}}
                        <div class="form-group">

                            <label>Select Staff</label>

                            <select
                                name="staff_id"
                                id="staff-select"
                                required
                                disabled
                            >

                                <option value="">
                                    First select a service
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- DATE AND TIME --}}
                    <div class="form-row">

                        <div class="form-group">

                            <label>Appointment Date</label>

                            <input
                                type="date"
                                name="appointment_date"
                                id="appointment_date"
                                min="{{ date('Y-m-d') }}"
                                value="{{ old('appointment_date') }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>Preferred Time</label>

                            <input
                                type="time"
                                name="appointment_time"
                                value="{{ old('appointment_time') }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- ADDITIONAL NOTES --}}
                    <div class="form-group">

                        <label>Additional Notes (Optional)</label>

                        <textarea
                            name="notes"
                            rows="3"
                            placeholder="Any special requests?"
                        >{{ old('notes') }}</textarea>

                    </div>


                    {{-- DATE ERROR MESSAGE --}}
                    <div
                        id="date-error-msg"
                        style="display:none; color:red; font-weight:600; margin-bottom:15px; text-align:center;"
                    >
                        This staff member is not available on the selected date.
                        Please choose another date.
                    </div>


                    {{-- SUBMIT BUTTON --}}
                    <button
                        type="submit"
                        class="btn-submit-appointment"
                    >
                        Book Appointment
                    </button>


                </form>

            </div>


        @else

            {{-- LOGIN REQUIRED --}}
            <div class="login-prompt-card text-center">

                <div class="icon-box">
                    <i class="fas fa-lock"></i>
                </div>

                <h3>Login Required</h3>

                <p>
                    To book an appointment, please login to your
                    Elegance account. If you don't have one,
                    you can register quickly!
                </p>

                <a
                    href="{{ route('login') }}"
                    class="btn-primary-pink"
                    style="padding:12px 35px; font-size:16px;"
                >
                    Login to Book Appointment
                </a>

            </div>

        @endauth

    </div>

</section>


{{-- AJAX STAFF FILTERING --}}
@auth

<script>

document.addEventListener('DOMContentLoaded', function () {

    const serviceSelect = document.getElementById('service-select');

    const staffSelect = document.getElementById('staff-select');

    const oldStaffId = @json(old('staff_id'));

    const staffUrl = @json(url('/appointment/staff'));


    // LOAD STAFF ACCORDING TO SELECTED SERVICE
    function loadStaff(serviceId, selectedStaff = '') {

        staffSelect.innerHTML =
            '<option value="">Loading experts...</option>';

        staffSelect.disabled = true;


        if (!serviceId) {

            staffSelect.innerHTML =
                '<option value="">First select a service</option>';

            return;

        }


        fetch(staffUrl + '/' + encodeURIComponent(serviceId))

            .then(response => {

                if (!response.ok) {
                    throw new Error('Unable to load staff');
                }

                return response.json();

            })

            .then(staff => {

                staffSelect.innerHTML =
                    '<option value="">Choose an expert</option>';


                if (staff.length === 0) {

                    staffSelect.innerHTML =
                        '<option value="">No staff available for this service</option>';

                    return;

                }


                staff.forEach(member => {

                    const option = document.createElement('option');

                    option.value = member.id;

                    option.textContent = member.name;


                    if (String(member.id) === String(selectedStaff)) {
                        option.selected = true;
                    }


                    staffSelect.appendChild(option);

                });


                staffSelect.disabled = false;

            })

            .catch(error => {

                console.error('Staff loading error:', error);

                staffSelect.innerHTML =
                    '<option value="">Error loading staff. Please try again.</option>';

            });

    }


    // WHEN CUSTOMER CHANGES SERVICE
    serviceSelect.addEventListener('change', function () {

        loadStaff(this.value);

    });


    // RESTORE OLD VALUES AFTER VALIDATION ERROR
    if (serviceSelect.value) {

        loadStaff(serviceSelect.value, oldStaffId);

    }


});

</script>

@endauth

@endsection
