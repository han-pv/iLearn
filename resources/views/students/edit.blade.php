@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <div>
                <h1>Edit Student</h1>
                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
            </div>
            <a href="{{ route('students.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Students
            </a>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('students.update', $student->id) }}" method="POST" class="form-content">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">
                            <i class="bi bi-person"></i> First Name <span class="required">*</span>
                        </label>
                        <input type="text" id="first_name" name="first_name" class="form-input" 
                               placeholder="Enter first name" required value="{{ $student->first_name }}">
                        @error('first_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            <i class="bi bi-person"></i> Last Name <span class="required">*</span>
                        </label>
                        <input type="text" id="last_name" name="last_name" class="form-input" 
                               placeholder="Enter last name" required value="{{ $student->last_name }}">
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
                               placeholder="student@example.com" required value="{{ $student->email }}">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="bi bi-telephone"></i> Phone
                        </label>
                        <input type="tel" id="phone" name="phone" class="form-input" 
                               placeholder="Enter phone number" value="{{ $student->phone }}">
                        @error('phone')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="branch_id" class="form-label">
                            <i class="bi bi-diagram-3"></i> Branch <span class="required">*</span>
                        </label>
                        <select id="branch_id" name="branch_id" class="form-input" required>
                            <option value="">Select a branch</option>
                            <!-- Add branch options dynamically from controller -->
                        </select>
                        @error('branch_id')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="enrollment_date" class="form-label">
                            <i class="bi bi-calendar-event"></i> Enrollment Date <span class="required">*</span>
                        </label>
                        <input type="date" id="enrollment_date" name="enrollment_date" class="form-input" 
                               required value="{{ $student->enrollment_date }}">
                        @error('enrollment_date')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="bio" class="form-label">
                        <i class="bi bi-file-text"></i> Biography
                    </label>
                    <textarea id="bio" name="bio" class="form-input" 
                              placeholder="Enter student biography" rows="4">{{ $student->bio }}</textarea>
                    @error('bio')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Update Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
