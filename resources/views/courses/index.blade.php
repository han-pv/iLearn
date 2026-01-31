@extends('layouts.app')

@section('content')
    <div class="container-xl py-4">
        <div class="d-flex justify-content-between align-items-center my-2">
            <div>
                <h1 class="text-primary">Courses</h1>
            </div>
            <div>
                <a href="{{ route("courses.create") }}" class="btn btn-primary">+ Add New Course</a>
            </div>
        </div>
        <div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div>
            <table class="table table-bordered table-striped table-hover text-center">
                <thead> 
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>#</th>
                    </tr>
                </thead>

                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-success">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection