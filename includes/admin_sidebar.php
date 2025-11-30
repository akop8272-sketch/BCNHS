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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Admin Only Links -->
            <?php if ($isAdmin) { ?>

            <li class="admin-nav-item">
                <a href="about.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span>Manage About Page</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="principal.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4h-8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <path d="M16 11h6"></path>
                    </svg>
                    <span>Manage Principal</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="faculties_staff.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Manage Faculty & Staff</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="curricula_programs.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <span>Manage Curricula and Programs</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="services.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 1 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                    <span>Manage Services</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="contact.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92V21a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.86 19.86 0 0 1-3.07-8.63A2 2 0 0 1 4 3h4.09a2 2 0 0 1 2 1.72c.12.81.37 1.59.72 2.32a2 2 0 0 1-.45 2.18L9 10a16 16 0 0 0 5 5l.78-.36a2 2 0 0 1 2.18.45c.73.35 1.51.6 2.32.72A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span>Manage Contact</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="learning_resources.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 10v6m0 0l-8.5-5-8.5 5m17 0V8c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2"></path>
                    </svg>
                    <span>Manage Learning Resources</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="users.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <circle cx="20" cy="20" r="2"></circle>
                        <path d="M21 19h-2"></path>
                    </svg>
                    <span>Manage Users</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="activity_logs.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="12" y1="11" x2="8" y2="11"></line>
                        <line x1="12" y1="15" x2="8" y2="15"></line>
                    </svg>
                    <span>Activity Logs</span>
                </a>
            </li>

            <?php } ?>

            <!-- Admin & Faculty Links (Content Management) -->
            <li class="admin-nav-item">
                <a href="events.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Manage Events</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="articles.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="12" y1="11" x2="8" y2="11"></line>
                        <line x1="12" y1="15" x2="8" y2="15"></line>
                    </svg>
                    <span>Manage Articles</span>
                </a>
            </li>

            <li class="admin-nav-item">
                <a href="achievements.php" class="admin-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                    <span>Manage Achievements</span>
                </a>
            </li>

        </ul>

    </nav>
</aside>
