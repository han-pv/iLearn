@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <div>
                <h1>Edit Course</h1>
                <p>{{ $course->name }}</p>
            </div>
            <a href="{{ route('courses.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Courses
            </a>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <form action="{{ route('courses.update', $course->id) }}" method="POST" class="form-content">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="bi bi-book"></i> Course Name <span class="required">*</span>
                    </label>
                    <input type="text" id="name" name="name" class="form-input" 
                           placeholder="Enter course name" required value="{{ $course->name }}">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="season" class="form-label">
                        <i class="bi bi-calendar"></i> Season <span class="required">*</span>
                    </label>
                    <input type="text" id="season" name="season" class="form-input" 
                           placeholder="e.g., Spring 2024" required value="{{ $course->season }}">
                    @error('season')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">
                        <i class="bi bi-file-text"></i> Description
                    </label>
                    <textarea id="description" name="description" class="form-input" 
                              placeholder="Enter course description" rows="5">{{ $course->description }}</textarea>
                    @error('description')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Update Course
                    </button>
                    <a href="{{ route('courses.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection