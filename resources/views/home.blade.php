@extends('layouts.app')

@section('content')
<div class="dashboard-container">
  <!-- Welcome Section -->
  <div class="welcome-section">
    <h1><i class="bi bi-graph-up"></i> Welcome to iLearn Dashboard</h1>
    <p>Manage your courses, teachers, students, and learning groups efficiently</p>
  </div>

  <!-- Statistics Cards -->
  <div class="stats-row">
    <div class="stat-card primary">
      <div class="stat-card-icon"><i class="bi bi-book"></i></div>
      <div class="stat-card-value" id="courseCount">0</div>
      <div class="stat-card-label">Total Courses</div>
    </div>

    <div class="stat-card success">
      <div class="stat-card-icon"><i class="bi bi-person-fill"></i></div>
      <div class="stat-card-value" id="teacherCount">0</div>
      <div class="stat-card-label">Active Teachers</div>
    </div>

    <div class="stat-card warning">
      <div class="stat-card-icon"><i class="bi bi-people-fill"></i></div>
      <div class="stat-card-value" id="studentCount">0</div>
      <div class="stat-card-label">Enrolled Students</div>
    </div>

    <div class="stat-card info">
      <div class="stat-card-icon"><i class="bi bi-collection"></i></div>
      <div class="stat-card-value" id="groupCount">0</div>
      <div class="stat-card-label">Learning Groups</div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="quick-actions">
    <h3><i class="bi bi-lightning-fill"></i> Quick Actions</h3>
    <div>
      <a href="{{ route('courses.index') }}" class="action-btn action-btn-primary">
        <i class="bi bi-plus-circle"></i>
        View Courses
      </a>
      <a href="{{ route('teachers.index') }}" class="action-btn action-btn-success">
        <i class="bi bi-briefcase"></i>
        Manage Teachers
      </a>
      <a href="{{ route('students.index') }}" class="action-btn action-btn-secondary">
        <i class="bi bi-person-check"></i>
        View Students
      </a>
      <a href="#" class="action-btn action-btn-warning">
        <i class="bi bi-folder-plus"></i>
        Create Group
      </a>
    </div>
  </div>

  <!-- Recent Courses -->
  <div class="recent-items">
    <h3><i class="bi bi-clock-history"></i> Recent Courses</h3>
    <div id="recentCourses">
      <div class="item-card">
        <div class="item-info">
          <h5>No courses yet</h5>
          <p>Start by creating your first course</p>
        </div>
        <span class="item-badge badge-primary">View All</span>
      </div>
    </div>
  </div>

  <!-- Recent Teachers -->
  <div class="recent-items">
    <h3><i class="bi bi-person-badge"></i> Recent Teachers</h3>
    <div id="recentTeachers">
      <div class="item-card">
        <div class="item-info">
          <h5>No teachers yet</h5>
          <p>Add your first teacher to get started</p>
        </div>
        <span class="item-badge badge-success">Add Teacher</span>
      </div>
    </div>
  </div>

  <!-- Recent Students -->
  <div class="recent-items">
    <h3><i class="bi bi-backpack"></i> Recent Students</h3>
    <div id="recentStudents">
      <div class="item-card">
        <div class="item-info">
          <h5>No students yet</h5>
          <p>Enroll students to begin</p>
        </div>
        <span class="item-badge badge-success">Enroll</span>
      </div>
    </div>
  </div>
</div>

@endsection