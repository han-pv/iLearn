@extends('layouts.app')

@section('content')
    <div class="container-xl py-4">
        <h1 class="text-success">Students Page</h1>
        <div class="my-4">
            <form action="/students" method="get" class="">
                <label for="">Course: </label>
                <select class="form-select" name="course">
                    <option selected>-</option>
                    @foreach ($cources as $cource)
                        <option value="{{ $cource->id }}">{{ $cource->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
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