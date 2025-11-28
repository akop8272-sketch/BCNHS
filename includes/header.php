<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include(__DIR__ . '/auth.php');
$isLoggedIn = isLoggedIn();
$userRole = $isLoggedIn ? $_SESSION['user_role'] : '';
?>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/websys/BCNHS/">BCNHS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/websys/BCNHS/">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/websys/BCNHS/about/">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/websys/BCNHS/curricula_programs/">Curricula and Programs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/websys/BCNHS/services/">Services</a>
        </li>
        
        <!-- Faculties & Staff - Visible to logged in users -->
        <?php if ($isLoggedIn) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/websys/BCNHS/faculties_staff/">Faculty and Staff</a>
        </li>
        <?php } ?>
        
        <!-- Learning Resources - Visible to logged in users -->
        <?php if ($isLoggedIn) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/websys/BCNHS/learning_resources/">Learning Resources</a>
        </li>
        <?php } ?>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Academics</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/websys/BCNHS/events/">Events</a>
            <a class="dropdown-item" href="/websys/BCNHS/achievements/">Achievements</a>
            <a class="dropdown-item" href="/websys/BCNHS/articles/">Articles</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">More...</a>
          </div>
        </li>
        
        <!-- Admin Panel - Visible to Admin and Faculty -->
        <?php if ($userRole === 'Admin' || $userRole === 'Faculty') { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
          <div class="dropdown-menu">
            <?php if ($userRole === 'Admin') { ?>
              <a class="dropdown-item" href="/websys/BCNHS/admin/">Admin Panel</a>
              <a class="dropdown-item" href="/websys/BCNHS/admin/users.php">Manage Users</a>
              <div class="dropdown-divider"></div>
            <?php } ?>
            <?php if ($userRole === 'Faculty') { ?>
              <a class="dropdown-item" href="/websys/BCNHS/admin/faculty-dashboard.php">Faculty Dashboard</a>
              <div class="dropdown-divider"></div>
            <?php } ?>
          </div>
        </li>
        <?php } ?>
      </ul>
      
      <!-- Right-side navbar items -->
      <ul class="navbar-nav ms-auto">
        <?php if ($isLoggedIn) { ?>
          <li class="nav-item">
            <a class="nav-link text-warning" href="/websys/BCNHS/logout.php">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/websys/BCNHS/login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>