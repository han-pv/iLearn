@extends('layouts.app')

@section('content')
    <div class="container-xl py-4">
        <h1 class="text-success">Students Page</h1>
        <div class="my-4">
            <form action="/students" method="get">
                <!-- courseId=2 -->
                <label for="">Course: </label>
                <select class="form-select" name="courseId">
                    <option selected>-</option>
                    @foreach ($cources as $cource)
                        <option value="{{ $cource->id }}">{{ $cource->name }}</option>
                    @endforeach
                </select>
                @error('courseId')
                    <div class="alert alert-danger small alert-dismissible fade show mt-2" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary mt-2">
                    Submit
                </button>
            </form>
        </div>

        <div>
            <div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Birth Date</th>
                            <th>Phone</th>
                            <th>Parent Phone Number</th>
                            <th>Branch</th>
                            <th>Teacher</th>
                            <th>Course</th>
                            <th>Classroom</th>
                        </tr>
                    </thead>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->birth_date }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->parent_phone }}</td>
                            <td>{{ $student->branch_id }}</td>
                            <td>{{ $student->teacher->name . " " . $student->teacher->lastname }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->classroom->name }}</td>
                            <td>
                                <!--  -->
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                {!! $students->links('pagination::bootstrap-5') !!}
            </div>
        </div>
@endsection