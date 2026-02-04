@extends('layouts.app')

@section('content')
<div>
  @if($errors->any())
    <div class="alert-message alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(session('success'))
    <div class="alert-message alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>

<div class="table-container">
  <div class="table-header">
    <h2><i class="bi bi-book"></i> Courses Management</h2>
    <div class="table-header-actions">
      <a href="{{ route('courses.create') }}" class="btn-add">
        <i class="bi bi-plus-circle"></i> Add New Course
      </a>
    </div>
  </div>

  @if($courses->count() > 0)
    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash"></i> ID</th>
            <th><i class="bi bi-file-text"></i> Course Name</th>
            <th><i class="bi bi-calendar"></i> Season</th>
            <th><i class="bi bi-gear"></i> Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($courses as $course)
            <tr>
              <td><strong>#{{ $course->id }}</strong></td>
              <td>{{ $course->name }}</td>
              <td>
                <span class="status-badge status-active">{{ $course->season }}</span>
              </td>
              <td>
                <div class="table-action-btns">
                  <a href="" class="btn-action btn-view" title="View">
                    <i class="bi bi-eye"></i>
                  </a>
                  <a href="{{ route('courses.edit', $course->id) }}" class="btn-action btn-edit" title="Edit">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('courses.destroy', $course->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete" title="Delete">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @if($courses->hasPages())
      <div class="table-pagination">
        {{ $courses->links('pagination::bootstrap-5') }}
      </div>
    @endif
  @else
    <div class="no-data">
      <i class="bi bi-inbox"></i>
      <h4>No courses found</h4>
      <p>Start by creating your first course</p>
      <a href="{{ route('courses.create') }}" class="btn-add" style="justify-content: center;">
        <i class="bi bi-plus-circle"></i> Create Course
      </a>
    </div>
  @endif
</div>

@endsection