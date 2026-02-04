@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <div>
                <h1>Add New Teacher</h1>
                <p>Register a new teacher to the system</p>
            </div>
            <a href="{{ route('teachers.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Teachers
            </a>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('teachers.store') }}" method="POST" class="form-content">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">
                            <i class="bi bi-person\"></i> First Name <span class="required">*</span>
                        </label>
                        <input type="text" id="first_name" name="first_name" class="form-input" 
                               placeholder="Enter first name" required value="{{ old('first_name') }}">
                        @error('first_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            <i class="bi bi-person"></i> Last Name <span class="required">*</span>
                        </label>
                        <input type="text" id="last_name" name="last_name" class="form-input" 
                               placeholder="Enter last name" required value="{{ old('last_name') }}">
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
                               placeholder="teacher@example.com" required value="{{ old('email') }}">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="bi bi-telephone"></i> Phone
                        </label>
                        <input type="tel" id="phone" name="phone" class="form-input" 
                               placeholder="Enter phone number" value="{{ old('phone') }}">
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
                           placeholder="e.g., Mathematics" required value="{{ old('subject') }}">
                    @error('subject')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio" class="form-label">
                        <i class="bi bi-file-text"></i> Biography
                    </label>
                    <textarea id="bio" name="bio" class="form-input" 
                              placeholder="Enter teacher biography" rows="4">{{ old('bio') }}</textarea>
                    @error('bio')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Add Teacher
                    </button>
                    <a href="{{ route('teachers.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
