// ============================================
// SIDEBAR MOBILE RESPONSIVENESS
// ============================================

// Toggle Sidebar - Handles both mobile and desktop
function toggleSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  
  if (!sidebar) return;

  const isMobile = window.innerWidth <= 768;
  
  if (isMobile) {
    // Mobile: Toggle mobile-open class
    sidebar.classList.toggle('mobile-open');
    overlay?.classList.toggle('active');
  } else {
    // Desktop: Toggle collapsed state and update localStorage
    sidebar.classList.toggle('collapsed');
    localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
  }
}

// Close Sidebar (Mobile only)
function closeSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  
  if (window.innerWidth <= 768) {
    sidebar?.classList.remove('mobile-open');
    overlay?.classList.remove('active');
  }
}

// Handle window resize to manage sidebar state
window.addEventListener('resize', function() {
  const sidebar = document.querySelector('.sidebar');
  
  // When resizing to desktop from mobile
  if (window.innerWidth > 768) {
    sidebar?.classList.remove('mobile-open');
    document.querySelector('.sidebar-overlay')?.classList.remove('active');
    document.querySelector('.sidebar-toggle')?.classList.remove('open');
  }
});

// ============================================
// ACTIVE LINK HIGHLIGHTING
// ============================================

function setActiveLink() {
  const currentPath = window.location.pathname;
  const links = document.querySelectorAll('.sidebar-link');

  links.forEach(link => {
    const href = link.getAttribute('href');
    if (href && (href === currentPath || currentPath.includes(href.replace(/\/$/, '')))) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

// ============================================
// DASHBOARD DATA LOADING
// ============================================

function loadDashboardData() {
  const stats = {
    courses: 8,
    teachers: 12,
    students: 125,
    groups: 6
  };

  // Animate counters
  animateCounter('courseCount', 0, stats.courses, 1500);
  animateCounter('teacherCount', 0, stats.teachers, 1500);
  animateCounter('studentCount', 0, stats.students, 1500);
  animateCounter('groupCount', 0, stats.groups, 1500);

  // Load sample data
  loadRecentCourses();
  loadRecentTeachers();
  loadRecentStudents();
}

// Animate Counter Function
function animateCounter(elementId, start, end, duration) {
  const element = document.getElementById(elementId);
  if (!element) return;

  const range = end - start;
  const increment = end > start ? 1 : -1;
  const stepTime = Math.abs(duration / range);
  let current = start;

  const timer = setInterval(() => {
    current += increment;
    element.textContent = current;
    if (current === end) {
      clearInterval(timer);
    }
  }, stepTime);
}

// Load Recent Courses
function loadRecentCourses() {
  const courses = [
    { name: 'Web Development Basics', category: 'Technology' },
    { name: 'Business Communication', category: 'Business' },
    { name: 'Data Science Fundamentals', category: 'Technology' }
  ];

  const container = document.getElementById('recentCourses');
  if (!container) return;

  container.innerHTML = courses.map(course => `
    <div class="item-card">
      <div class="item-info">
        <h5>${course.name}</h5>
        <p>${course.category}</p>
      </div>
      <span class="item-badge badge-primary">Active</span>
    </div>
  `).join('');
}

// Load Recent Teachers
function loadRecentTeachers() {
  const teachers = [
    { name: 'Dr. John Smith', subject: 'Mathematics' },
    { name: 'Mrs. Emma Johnson', subject: 'English' },
    { name: 'Prof. Michael Brown', subject: 'Science' }
  ];

  const container = document.getElementById('recentTeachers');
  if (!container) return;

  container.innerHTML = teachers.map(teacher => `
    <div class="item-card">
      <div class="item-info">
        <h5>${teacher.name}</h5>
        <p>${teacher.subject}</p>
      </div>
      <span class="item-badge badge-success">Teaching</span>
    </div>
  `).join('');
}

// Load Recent Students
function loadRecentStudents() {
  const students = [
    { name: 'Alex Johnson', courses: 3 },
    { name: 'Sarah Williams', courses: 4 },
    { name: 'Tom Davis', courses: 2 }
  ];

  const container = document.getElementById('recentStudents');
  if (!container) return;

  container.innerHTML = students.map(student => `
    <div class="item-card">
      <div class="item-info">
        <h5>${student.name}</h5>
        <p>Enrolled in ${student.courses} course(s)</p>
      </div>
      <span class="item-badge badge-success">Active</span>
    </div>
  `).join('');
}

// ============================================
// INITIALIZATION
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');
  const navbarToggle = document.querySelector('.navbar-toggle');

  // Initialize desktop sidebar state from localStorage
  const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
  if (sidebarCollapsed && window.innerWidth > 768) {
    sidebar?.classList.add('collapsed');
  }

  // Mobile navbar toggle button click handler
  if (navbarToggle) {
    navbarToggle.addEventListener('click', function(e) {
      e.stopPropagation();
      toggleSidebar();
    });
  }

  // Overlay click handler (close sidebar on mobile)
  if (overlay) {
    overlay.addEventListener('click', closeSidebar);
  }

  // Close sidebar when clicking on a sidebar link (mobile)
  const sidebarLinks = document.querySelectorAll('.sidebar-link');
  sidebarLinks.forEach(link => {
    link.addEventListener('click', function() {
      closeSidebar();
    });
  });

  // Set active link based on current page
  setActiveLink();

  // Load dashboard data if on dashboard page
  if (document.querySelector('.dashboard-container')) {
    loadDashboardData();
  }
});
