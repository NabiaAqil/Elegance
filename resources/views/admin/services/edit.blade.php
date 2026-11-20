
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <div>
            <h2>Edit Service</h2>
            <p>Update salon service information.</p>
        </div>

        <a href="{{ route('admin.services.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
    </div>

    <div class="staff-edit-card">

        <form action="{{ route('admin.services.update', $service->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="staff-form-grid">

                <div class="form-group">
                    <label>Service Name</label>
                    <input type="text" name="name"
                           value="{{ old('name', $service->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug"
                           value="{{ old('slug', $service->slug) }}" required>
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Price (Rs.)</label>
                    <input type="number" name="price" min="0" step="0.01"
                           value="{{ old('price', $service->price) }}" required>
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Duration</label>
                    <input type="text" name="duration"
                           value="{{ old('duration', $service->duration) }}" required>
                    @error('duration') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Brands Used</label>
                    <input type="text" name="brands_used"
                           value="{{ old('brands_used', $service->brands_used) }}">
                    @error('brands_used') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Short Description</label>
                    <textarea name="short_description" rows="4">{{ old('short_description', $service->short_description) }}</textarea>
                    @error('short_description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Current Service Image</label>

                    @if($service->image)
                        <div style="margin: 10px 0;">
                            <img src="{{ asset('images/' . $service->image) }}"
                                 alt="{{ $service->name }}"
                                 width="120"
                                 style="height: 100px; object-fit: cover; border-radius: 8px;">
                        </div>
                    @else
                        <p>No image available.</p>
                    @endif

                    <label>Upload New Image (Optional)</label>
                    <input type="file" name="image" accept="image/*">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

            </div>

            <div class="staff-form-actions">
                <a href="{{ route('admin.services.index') }}" class="staff-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="staff-save-btn">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
