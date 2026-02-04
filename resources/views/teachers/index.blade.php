@extends('layouts.app')

@section('content')
<div>
  @if(session('success'))
    <div class="alert-message alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>

<div class="table-container">
  <div class="table-header">
    <h2><i class="bi bi-person-badge"></i> Teachers Management</h2>
    <div class="table-header-actions">
      <a href="#" class="btn-add">
        <i class="bi bi-plus-circle"></i> Add New Teacher
      </a>
    </div>
  </div>

  @if($teachers->count() > 0)
    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash"></i> ID</th>
            <th><i class="bi bi-person"></i> First Name</th>
            <th><i class="bi bi-person"></i> Last Name</th>
            <th><i class="bi bi-envelope"></i> Email</th>
            <th><i class="bi bi-phone"></i> Phone</th>
            <th><i class="bi bi-gear"></i> Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($teachers as $teacher)
            <tr>
              <td><strong>#{{ $teacher->id }}</strong></td>
              <td>{{ $teacher->name }}</td>
              <td>{{ $teacher->lastname }}</td>
              <td>
                <i class="bi bi-envelope-fill" style="color: #667eea;"></i> 
                {{ $teacher->email }}
              </td>
              <td>
                <i class="bi bi-telephone-fill" style="color: #4facfe;"></i>
                {{ $teacher->phone ?? 'N/A' }}
              </td>
              <td>
                <div class="table-action-btns">
                  <a href="{{ route('teachers.show', $teacher->id) }}" class="btn-action btn-view" title="View">
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

    @if($teachers->hasPages())
      <div class="table-pagination">
        {{ $teachers->links('pagination::bootstrap-5') }}
      </div>
    @endif
  @else
    <div class="no-data">
      <i class="bi bi-inbox"></i>
      <h4>No teachers found</h4>
      <p>Start by adding your first teacher</p>
      <a href="#" class="btn-add" style="justify-content: center;">
        <i class="bi bi-plus-circle"></i> Add Teacher
      </a>
    </div>
  @endif
</div>

@endsection