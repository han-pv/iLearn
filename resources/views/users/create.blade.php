@extends('layouts.app')

@section('content')
    <div class="form-container">
        <!-- Page Header -->
        <div class="form-header">
            <a href="{{ route('users.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h1>Add New User</h1>
            </div>
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
        
        <div class="form-card">
            <form action="{{ route('users.store') }}" method="POST" class="form-content">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="bi bi-person\"></i> Name <span class="required">*</span>
                    </label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter name" required
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">
                        <i class="bi bi-person\"></i> Username <span class="required">*</span>
                    </label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Enter username"
                        required value="{{ old('username') }}">
                    @error('username')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-person\"></i> password <span class="required">*</span>
                    </label>
                    <input type="text" id="password" name="password" class="form-input" placeholder="Enter password"
                        required value="{{ old('password') }}">
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check form-switch">
                        <input class="form-check-input" value="1" name="is_admin" type="checkbox" role="switch" id="isAdmin" checked>
                        <label class="form-check-label" for="isAdmin">Is Admin</label>
                    </div>
                    @error('is_admin')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-check-circle"></i> Add User
                    </button>
                    <a href="{{ route('users.index') }}" class="btn-cancel">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection