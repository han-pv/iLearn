@extends('layouts.app')

@section('content')
<div class="table-filter-section">
  <h3><i class="bi bi-funnel"></i> Search & Filter Students</h3>
  
  <form action="{{ route('students.index') }}" method="get" class="filter-form">
    <div class="filter-group">
      <label><i class="bi bi-diagram-2"></i> Branch:</label>
      <select class="form-select" name="branchId">
        <option value="">All Branches</option>
        @foreach ($branches as $branch)
          <option value="{{ $branch->id }}" {{ request('branchId') == $branch->id ? 'selected' : '' }}>
            {{ $branch->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="filter-group">
      <label><i class="bi bi-book"></i> Course:</label>
      <select class="form-select" name="courseId">
        <option value="">All Courses</option>
        @foreach ($cources as $cource)
          <option value="{{ $cource->id }}" {{ request('courseId') == $cource->id ? 'selected' : '' }}>
            {{ $cource->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="filter-group">
      <label><i class="bi bi-person-badge"></i> Teacher:</label>
      <select class="form-select" name="teacherId">
        <option value="">All Teachers</option>
        @foreach ($teachers as $teacher)
          <option value="{{ $teacher->id }}" {{ request('teacherId') == $teacher->id ? 'selected' : '' }}>
            {{ $teacher->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="filter-group">
      <label><i class="bi bi-door-left"></i> Classroom:</label>
      <select class="form-select" name="classroomId">
        <option value="">All Classrooms</option>
        @foreach ($classrooms as $classroom)
          <option value="{{ $classroom->id }}" {{ request('classroomId') == $classroom->id ? 'selected' : '' }}>
            {{ $classroom->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="filter-group">
      <label><i class="bi bi-calendar"></i> Age Range:</label>
      <div style="display: flex; gap: 0.5rem;">
        <input type="number" class="form-control" name="ageFrom" placeholder="From" value="{{ request('ageFrom') }}">
        <input type="number" class="form-control" name="ageTo" placeholder="To" value="{{ request('ageTo') }}">
      </div>
    </div>

    <div class="filter-group">
      <label style="visibility: hidden;">Action</label>
      <div class="filter-actions">
        <button type="submit" class="btn-submit">
          <i class="bi bi-search"></i> Search
        </button>
        <a href="{{ route('students.index') }}" class="btn-reset">
          <i class="bi bi-arrow-counterclockwise"></i> Reset
        </a>
      </div>
    </div>
  </form>
</div>

<div class="table-container">
  <div class="table-header">
    <h2><i class="bi bi-backpack"></i> Students Management</h2>
    <div class="table-header-actions">
      <a href="#" class="btn-add">
        <i class="bi bi-plus-circle"></i> Add New Student
      </a>
    </div>
  </div>

  @if($students->count() > 0)
    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash"></i> ID</th>
            <th><i class="bi bi-person"></i> Name</th>
            <th><i class="bi bi-person"></i> Last Name</th>
            <th><i class="bi bi-calendar"></i> Birth Date</th>
            <th><i class="bi bi-calculator"></i> Age</th>
            <th><i class="bi bi-telephone"></i> Phone</th>
            <th><i class="bi bi-telephone"></i> Parent Phone</th>
            <th><i class="bi bi-diagram-2"></i> Branch</th>
            <th><i class="bi bi-person-badge"></i> Teacher</th>
            <th><i class="bi bi-book"></i> Course</th>
            <th><i class="bi bi-door-left"></i> Classroom</th>
            <th><i class="bi bi-gear"></i> Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr>
              <td><strong>#{{ $student->id }}</strong></td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->lastname }}</td>
              <td>
                <span class="status-badge status-pending">
                  {{ \Carbon\Carbon::parse($student->birth_date)->format('M d, Y') }}
                </span>
              </td>
              <td><strong>{{ $student->age }}</strong></td>
              <td>{{ $student->phone ?? 'N/A' }}</td>
              <td>{{ $student->parent_phone ?? 'N/A' }}</td>
              <td>{{ $student->branch->name ?? 'N/A' }}</td>
              <td>
                <span class="status-badge status-active">
                  {{ $student->teacher->name . ' ' . $student->teacher->lastname }}
                </span>
              </td>
              <td>{{ $student->course->name ?? 'N/A' }}</td>
              <td>{{ $student->classroom->name ?? 'N/A' }}</td>
              <td>
                <div class="table-action-btns">
                  <a href="#" class="btn-action btn-view" title="View">
                    <i class="bi bi-eye"></i>
                  </a>
                  <a href="#" class="btn-action btn-edit" title="Edit">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <a href="#" class="btn-action btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                    <i class="bi bi-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @if($students->hasPages())
      <div class="table-pagination">
        {{ $students->links('pagination::bootstrap-5') }}
      </div>
    @endif
  @else
    <div class="no-data">
      <i class="bi bi-inbox"></i>
      <h4>No students found</h4>
      <p>Start by adding your first student</p>
      <a href="#" class="btn-add" style="justify-content: center;">
        <i class="bi bi-plus-circle"></i> Add Student
      </a>
    </div>
  @endif
</div>

@endsection