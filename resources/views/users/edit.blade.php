@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <div>
                <h1>Edit teachers</h1>
                <p>Update teacher information in the system</p>
            </div>
            <a href="{{ route('teachers.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Teachers
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @error('error')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        @error('any')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data"
                class="form-content">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">
                            <i class="bi bi-person\"></i> First Name <span class="required">*</span>
                        </label>
                        <input type="text" id="first_name" name="first_name" class="form-input"
                            placeholder="Enter first name" required value="{{ $teacher->name }}">
                        @error('first_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            <i class="bi bi-person"></i> Last Name <span class="required">*</span>
                        </label>
                        <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Enter last name"
                            required value="{{ $teacher->lastname }}">
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
                        <input type="email" id="email" name="email" class="form-input" placeholder="teacher@example.com"
                            required value="{{ $teacher->email }}">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">
                        <i class="bi bi-book-half"></i> Address <span class="required">*</span>
                    </label>
                    <input type="text" id="address" name="address" class="form-input" placeholder="Enter address" required
                        value="{{ $teacher->address }}">
                    @error('address')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="experience" class="form-label">
                            <i class="bi bi-book-half"></i> Experience <span class="required">*</span>
                        </label>
                        <input type="text" id="experience" name="experience" class="form-input" placeholder="e.g., 5 years"
                            required value="{{ $teacher->experience }}">
                        @error('experience')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="degree" class="form-label">
                            <i class="bi bi-graduation-cap"></i> Degree <span class="required">*</span>
                        </label>
                        <input type="text" id="degree" name="degree" class="form-input"
                            placeholder="e.g., Master's in Mathematics" required value="{{ $teacher->degree }}">
                        @error('degree')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="knowledge" class="form-label">
                            <i class="bi bi-lightbulb"></i> Knowledge <span class="required">*</span>
                        </label>
                        <input type="text" id="knowledge" name="knowledge" class="form-input"
                            placeholder="e.g., Advanced Mathematics" required value="{{ $teacher->knowledge }}">
                        @error('knowledge')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="education" class="form-label">
                            <i class="bi bi-book"></i> Education <span class="required">*</span>
                        </label>
                        <input type="text" id="education" name="education" class="form-input"
                            placeholder="e.g., Bachelor's in Education" required value="{{ $teacher->education }}">
                        @error('education')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @if ($teacher->image_path)
                    <div>
                        <img src="{{ asset('storage/' . $teacher->image_path) }}" alt="Teacher Image" class="teacher-image w-50">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image" class="form-label">
                        <i class="bi bi-book"></i> Image
                    </label>
                    <input type="file" id="image" name="image" class="form-input" placeholder="e.g., teacher123.jpg">
                    @error('image')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio" class="form-label">
                        <i class="bi bi-file-text"></i> Biography
                    </label>
                    <textarea id="bio" name="bio" class="form-input" placeholder="Enter teacher biography"
                        rows="4">{{ $teacher->bio }}</textarea>
                    @error('bio')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Update
                    </button>
                    <a href="{{ route('teachers.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection