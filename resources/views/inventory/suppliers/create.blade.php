@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Add New Supplier</h2>
                <p class="text-muted">
                    Enter the details of your new salon supplier.
                </p>
            </div>

            <a href="{{ route('inventory.suppliers.index') }}"
               class="btn-outline-dark">
                Back to Suppliers
            </a>
        </div>


        {{-- SUPPLIER FORM --}}
        <div class="supplier-form-wrapper">

            <form action="{{ route('inventory.suppliers.store') }}"
                  method="POST">

                @csrf

                <div class="supplier-form-grid">

                    {{-- Supplier Name --}}
                    <div class="form-group">
                        <label for="name">Supplier Name *</label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter supplier name"
                               required>

                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Contact Person --}}
                    <div class="form-group">
                        <label for="contact_person">Contact Person</label>

                        <input type="text"
                               id="contact_person"
                               name="contact_person"
                               value="{{ old('contact_person') }}"
                               placeholder="Enter contact person">

                        @error('contact_person')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Phone --}}
                    <div class="form-group">
                        <label for="phone">Phone Number</label>

                        <input type="text"
                               id="phone"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="Enter phone number">

                        @error('phone')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email Address</label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter email address">

                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Address --}}
                    <div class="form-group full-width">
                        <label for="address">Address</label>

                        <textarea id="address"
                                  name="address"
                                  rows="4"
                                  placeholder="Enter supplier address">{{ old('address') }}</textarea>

                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                {{-- FORM BUTTONS --}}
                <div class="supplier-form-buttons">

                    <a href="{{ route('inventory.suppliers.index') }}"
                       class="btn-outline-dark">
                        Cancel
                    </a>

                    <button type="submit" class="btn-primary-pink">
                        Save Supplier
                    </button>

                </div>

            </form>

        </div>

    </div>
</section>


@endsection
