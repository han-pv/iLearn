@extends('layouts.app')

@section('content')
    <div class="container-xl py-4">
        <h1 class="text-primary">Students</h1>
        <div class="my-4">
            <form action="{{ route('students.index') }}" method="get">
                <div class="row row-cols-3 g-3">
                    <div class="col">
                        <label class="form-label">Branch:</label>
                        <select class="form-select" name="branchId">
                            <option value="">-</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Course:</label>
                        <select class="form-select" name="courseId">
                            <option value="">-</option>
                            @foreach ($cources as $cource)
                                <option value="{{ $cource->id }}">
                                    {{ $cource->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Teacher:</label>
                        <select class="form-select" name="teacherId">
                            <option value="">-</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Classroom:</label>
                        <select class="form-select" name="classroomId">
                            <option value="">-</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">
                                    {{ $classroom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Age:</label>
                        <div class="row g-2">
                            <div class="col">
                                <input type="text" class="form-control" name="ageFrom">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="ageTo">
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex align-items-end">
                        <div class="d-flex w-100">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary w-100 ms-2">Reset</a>
                        </div>
                    </div>
                </div>
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
                            <th>Age</th>
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
                            <td>{{ $student->age }}</td>
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