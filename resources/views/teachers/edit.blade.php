@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <div>
                <h1>Edit Teacher</h1>
                <p>{{ $teacher->first_name }} {{ $teacher->last_name }}</p>
            </div>
            <a href="{{ route('teachers.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Teachers
            </a>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="form-content">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">
                            <i class="bi bi-person"></i> First Name <span class="required">*</span>
                        </label>
                        <input type="text" id="first_name" name="first_name" class="form-input" 
                               placeholder="Enter first name" required value="{{ $teacher->first_name }}">
                        @error('first_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            <i class="bi bi-person"></i> Last Name <span class="required">*</span>
                        </label>
                        <input type="text" id="last_name" name="last_name" class="form-input" 
                               placeholder="Enter last name" required value="{{ $teacher->last_name }}">
                        @error('last_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope"></i> Email <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="form-input" 
                               placeholder="teacher@example.com" required value="{{ $teacher->email }}">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="bi bi-telephone"></i> Phone
                        </label>
                        <input type="tel" id="phone" name="phone" class="form-input" 
                               placeholder="Enter phone number" value="{{ $teacher->phone }}">
                        @error('phone')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">
                        <i class="bi bi-book-half"></i> Subject <span class="required">*</span>
                    </label>
                    <input type="text" id="subject" name="subject" class="form-input" 
                           placeholder="e.g., Mathematics" required value="{{ $teacher->subject }}">
                    @error('subject')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio" class="form-label">
                        <i class="bi bi-file-text"></i> Biography
                    </label>
                    <textarea id="bio" name="bio" class="form-input" 
                              placeholder="Enter teacher biography" rows="4">{{ $teacher->bio }}</textarea>
                    @error('bio')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Update Teacher
                    </button>
                    <a href="{{ route('teachers.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
