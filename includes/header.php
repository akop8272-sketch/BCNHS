<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include(__DIR__ . '/auth.php');
$isLoggedIn = isLoggedIn();
$userRole = $isLoggedIn ? $_SESSION['user_role'] : '';

// Get the base URL (root of the project)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
// Get the part of SCRIPT_NAME up to the project root (BCNHS)
$script_name = $_SERVER['SCRIPT_NAME'];
// Find 'BCNHS' in the script path and extract everything up to and including it
preg_match('#^(.*?/BCNHS)#', $script_name, $matches);
$base_url = $protocol . '://' . $host . ($matches[1] ?? '');
?>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo $base_url; ?>/index.php">BCNHS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo $base_url; ?>/index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $base_url; ?>/about/index.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $base_url; ?>/curricula_programs/index.php">Curricula and Programs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $base_url; ?>/services/index.php">Services</a>
        </li>
        
        <!-- Faculties & Staff - Visible to logged in users -->
        <?php if ($isLoggedIn) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $base_url; ?>/faculties_staff/index.php">Faculty and Staff</a>
        </li>
        <?php } ?>
        
        <!-- Learning Resources - Visible to logged in users -->
        <?php if ($isLoggedIn) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $base_url; ?>/learning_resources/index.php">Learning Resources</a>
        </li>
        <?php } ?>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Academics</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo $base_url; ?>/events/index.php">Events</a>
            <a class="dropdown-item" href="<?php echo $base_url; ?>/achievements/index.php">Achievements</a>
            <a class="dropdown-item" href="<?php echo $base_url; ?>/articles/index.php">Articles</a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        
        <!-- Admin Panel - Visible to Admin and Faculty -->
        <?php if ($userRole === 'Admin' || $userRole === 'Faculty') { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
          <div class="dropdown-menu">
            <?php if ($userRole === 'Admin') { ?>
              <a class="dropdown-item" href="<?php echo $base_url; ?>/admin/index.php">Admin Panel</a>
              <a class="dropdown-item" href="<?php echo $base_url; ?>/admin/users.php">Manage Users</a>
              <div class="dropdown-divider"></div>
            <?php } ?>
            <?php if ($userRole === 'Faculty') { ?>
              <a class="dropdown-item" href="<?php echo $base_url; ?>/admin/faculty-dashboard.php">Faculty Dashboard</a>
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
            <a class="nav-link text-warning" href="<?php echo $base_url; ?>/logout.php">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $base_url; ?>/login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>