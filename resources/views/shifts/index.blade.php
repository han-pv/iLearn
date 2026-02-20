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
      <h2><i class="bi bi-person-badge"></i> Shift Management</h2>
      <div class="table-header-actions">
        <a href="{{ route('shifts.create') }}" class="btn-add">
          <i class="bi bi-plus-circle"></i> Add New Shift
        </a>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash"></i> ID</th>
            <th><i class="bi bi-hash"></i> Name</th>
            <th><i class="bi bi-hash"></i> Start time</th>
            <th><i class="bi bi-hash"></i> End time</th>
            <th><i class="bi bi-gear"></i> Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($shifts as $shift)
            <tr>
              <td><strong>#{{ $shift->id }}</strong></td>
              <!-- <td>{{ $shift->getName() }}</td> -->
              <td>{{ $shift->name }}</td>
              <td>{{ $shift->start_time }}</td>
              <td>{{ $shift->end_time }}</td>
              <td class="col-3">
                <div class="table-action-btns">
                  <a href="{{ route('shifts.edit', $shift->id) }}" class="btn-action btn-edit" title="Edit">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('shifts.destroy', $shift->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden">
                    <button type="submit" class="btn-action btn-delete" title="Delete"
                      onclick="return confirm('Are you sure?')">
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

  </div>

@endsection