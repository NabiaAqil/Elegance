@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Edit Supplier</h2>
                <p class="text-muted">
                    Update supplier information and contact details.
                </p>
            </div>

            <a href="{{ route('inventory.suppliers.index') }}"
               class="btn-outline-dark">
                Back to Suppliers
            </a>
        </div>


        {{-- SUPPLIER FORM --}}
        <div class="supplier-form-wrapper">

            <form action="{{ route('inventory.suppliers.update', $supplier->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="supplier-form-grid">

                    {{-- Supplier Name --}}
                    <div class="form-group">
                        <label for="name">Supplier Name *</label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $supplier->name) }}"
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
                               value="{{ old('contact_person', $supplier->contact_person) }}"
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
                               value="{{ old('phone', $supplier->phone) }}"
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
                               value="{{ old('email', $supplier->email) }}"
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
                                  placeholder="Enter supplier address">{{ old('address', $supplier->address) }}</textarea>

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
                        Update Supplier
                    </button>

                </div>

            </form>

        </div>

    </div>
</section>


{{-- FORM STYLING --}}
<style>

    .supplier-form-wrapper {
        background: #FFFFFF;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(89, 0, 25, 0.07);
        border: 1px solid #F8BBD0;
    }

    .supplier-form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 22px;
    }

    .supplier-form-wrapper .form-group {
        display: flex;
        flex-direction: column;
    }

    .supplier-form-wrapper label {
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 500;
        color: var(--burgundy);
        margin-bottom: 8px;
    }

    .supplier-form-wrapper input,
    .supplier-form-wrapper textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #E8C7D1;
        border-radius: 7px;
        font-family: var(--font-body);
        font-size: 13px;
        color: var(--text-dark);
        background: #FFFAFB;
        outline: none;
        box-sizing: border-box;
    }

    .supplier-form-wrapper input:focus,
    .supplier-form-wrapper textarea:focus {
        border-color: var(--dark-pink);
        box-shadow: 0 0 0 3px rgba(194, 24, 91, 0.08);
    }

    .supplier-form-wrapper textarea {
        resize: vertical;
    }

    .full-width {
        grid-column: span 2;
    }

    .supplier-form-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #F8DDE5;
    }

    .error-message {
        color: #C62828;
        font-size: 12px;
        margin-top: 5px;
    }

    @media (max-width: 600px) {
        .supplier-form-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: span 1;
        }

        .supplier-form-wrapper {
            padding: 20px;
        }
    }

</style>

@endsection
