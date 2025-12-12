<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include(__DIR__ . '/auth.php');
$isAdmin = hasRole('Admin');
$isFaculty = hasRole('Faculty');
?>
<!-- Admin Sidebar -->

<aside class="admin-sidebar">
    <div class="admin-logo">
        <h3>BCNHS</h3>
        <p><?php echo $isAdmin ? 'Admin Panel' : 'Faculty Panel'; ?></p>
    </div>

    <nav class="admin-nav">
        <ul class="admin-nav-list">
            <li class="admin-nav-item">
                <a href="index.php" class="admin-nav-link">
                 
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Admin Only Links -->
            <?php if ($isAdmin) { ?>

            <li class="admin-nav-item">
                <a href="about.php" class="admin-nav-link">
    
                    <span>Manage About Page</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="principal.php" class="admin-nav-link">
               
                    <span>Manage Principal</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="faculties_staff.php" class="admin-nav-link">
              
                    <span>Manage Faculty & Staff</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="curricula_programs.php" class="admin-nav-link">
             
                    <span>Manage Curricula and Programs</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="services.php" class="admin-nav-link">
                 
                    <span>Manage Services</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="contact.php" class="admin-nav-link">
                
                    <span>Manage Contact</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="learning_resources.php" class="admin-nav-link">
                 
                    <span>Manage Learning Resources</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="users.php" class="admin-nav-link">
                
                    <span>Manage Users</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="activity_logs.php" class="admin-nav-link">
                 
                    <span>Activity Logs</span>
                </a>
            </li>

            <?php } ?>

            <!-- Admin & Faculty Links (Content Management) -->
            <li class="admin-nav-item">
                <a href="events.php" class="admin-nav-link">
                 
                    <span>Manage Events</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="articles.php" class="admin-nav-link">
              
                    <span>Manage Articles</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="achievements.php" class="admin-nav-link">
               
                    <span>Manage Achievements</span>
                </a>
            </li>

        </ul>

    </nav>
</aside>
