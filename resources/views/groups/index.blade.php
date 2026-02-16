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
      <h2><i class="bi bi-book"></i> Groups</h2>
      <div class="table-header-actions">
        <a href="" class="btn-add">
          <i class="bi bi-plus-circle"></i> {{ __("app.addNew") }}
        </a>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="data-table">
        <thead>
          <tr>
            <th><i class="bi bi-hash"></i> ID</th>
            <th><i class="bi bi-file-text"></i> Course Name</th>
            <th><i class="bi bi-gear"></i> Actions</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>

    @if($groups->hasPages())
      <div class="table-pagination">
        {{ $groups->links('pagination::bootstrap-5') }}
      </div>
    @endif
  </div>

@endsection