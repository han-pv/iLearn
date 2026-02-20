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
      <h2><i class="bi bi-person-badge"></i> users Management</h2>
      <div class="table-header-actions">
        <a href="{{ route('users.create') }}" class="btn-add">
          <i class="bi bi-plus-circle"></i> Add New user
        </a>
      </div>
    </div>

    @if($users->count() > 0)
      <div class="table-wrapper">
        <table class="data-table">
          <thead>
            <tr>
              <th><i class="bi bi-hash"></i> ID</th>
              <th><i class="bi bi-hash"></i> Name</th>
              <th><i class="bi bi-person"></i> Username</th>
              <th><i class="bi bi-person"></i> Is Admin</th>
              <th><i class="bi bi-gear"></i> Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td><strong>#{{ $user->id }}</strong></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>
                  <i class="h6 bi {{ $user->is_admin ? 'bi-check-circle text-success' : 'bi-dash-circle text-muted' }}"></i>
                </td>
                <td class="col-3">
                  <div class="table-action-btns">
                    <a href="{{ route('users.show', $user->id) }}" class="btn-action btn-view" title="View">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn-action btn-edit" title="Edit">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
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

      @if($users->hasPages())
        <div class="table-pagination">
          {{ $users->links('pagination::bootstrap-5') }}
        </div>
      @endif
    @else
      <div class="no-data">
        <i class="bi bi-inbox"></i>
        <h4>No users found</h4>
        <p>Start by adding your first user</p>
        <a href="#" class="btn-add" style="justify-content: center;">
          <i class="bi bi-plus-circle"></i> Add user
        </a>
      </div>
    @endif
  </div>

@endsection