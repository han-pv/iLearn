@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">teacher Profile</h2>
            <a href="" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ asset('img/default.jpg') }}" class="w-100" alt="Profile Picture">
                        </div>
                        <h4 class="mb-1">{{ $teacher->name }} {{ $teacher->lastname }}</h4>
                        <p class="text-muted mb-3">Branch ID: {{ $teacher->branch_id }}</p>
                        <hr>
                        <div class="text-start">
                            <p class="mb-2"><strong>Email:</strong> <br> {{ $teacher->email }}</p>
                            <p class="mb-2"><strong>Salary:</strong> <br> ${{ number_format($teacher->salary, 2) }}</p>
                            <p class="mb-0"><strong>Joined:</strong> <br> {{ $teacher->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light fw-bold">Contact Details</div>
                    <div class="card-body">
                        <p class="card-text mb-0">{{ $teacher->address }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 text-primary">Biography</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $teacher->bio ?? 'No biography provided.' }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-primary">Education</h5>
                            </div>
                            <div class="card-body">
                                <h6><strong>Degree:</strong></h6>
                                <p>{{ $teacher->degree }}</p>
                                <h6><strong>Institution:</strong></h6>
                                <p>{{ $teacher->education }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-primary">Skills & Experience</h5>
                            </div>
                            <div class="card-body">
                                <h6><strong>Experience:</strong></h6>
                                <p>{{ $teacher->experience }}</p>
                                <h6><strong>Knowledge:</strong></h6>
                                <p>
                                    @foreach(explode(',', $teacher->knowledge) as $skill)
                                        <span class="badge bg-info text-dark">{{ trim($skill) }}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-muted small">
                    Last updated: {{ $teacher->updated_at->diffForHumans() }}
                </div>

                @foreach ($teacher->students as $student)
                    <div>
                        {{ $student->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection