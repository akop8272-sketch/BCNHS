<?php
include('../includes/auth.php');
include('../functions/functions.php');
requireAdmin();

$currentUser = getCurrentUser();

// Initialize modules for data fetching
$articlesModule = new ArticlesModule();
$eventsModule = new EventsModule();
$achievementsModule = new AchievementsModule();
$usersModule = new UsersModule();
$facultyStaffModule = new FacultyStaffModule();
$programsModule = new ProgramsModule();

// Fetch statistics
$totalUsers = count($usersModule->fetchUsers());
$totalFaculty = count($facultyStaffModule->fetchFacultyStaff());
$totalPrograms = count($programsModule->fetchPrograms());
$totalEvents = count($eventsModule->fetchEvents());

// Fetch recent activities from activity log
$activityLogModule = new ActivityLogModule();
$recentActivities = $activityLogModule->getRecentActivities(5);

// Format activities for display
$activities = [];
foreach ($recentActivities as $activity) {
    $actionText = '';
    switch($activity['action']) {
        case 'created':
            $actionText = ucfirst($activity['content_type']) . ' created';
            break;
        case 'updated':
            $actionText = ucfirst($activity['content_type']) . ' updated';
            break;
        case 'deleted':
            $actionText = ucfirst($activity['content_type']) . ' deleted';
            break;
        default:
            $actionText = ucfirst($activity['content_type']) . ' ' . $activity['action'];
    }
    
    $activities[] = [
        'type' => $activity['content_type'],
        'title' => $activity['content_title'] ?? 'Untitled',
        'description' => $actionText,
        'date' => $activity['created_at'],
        'user_name' => $activity['user_name'] ?? 'Unknown',
        'user_role' => $activity['user_role'] ?? 'Unknown'
    ];
}

// Helper function to format time ago
function timeAgo($date) {
    $time = strtotime($date);
    $time_difference = time() - $time;
    
    if($time_difference < 60) return 'seconds ago';
    else if($time_difference < 3600) return floor($time_difference / 60) . ' minutes ago';
    else if($time_difference < 86400) return floor($time_difference / 3600) . ' hours ago';
    else if($time_difference < 604800) return floor($time_difference / 86400) . ' days ago';
    else return date('M d, Y', $time);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php') ?>
    
    <div class="admin-body">
        <?php include('../includes/admin_sidebar.php') ?>

        <!-- Main Content -->
    <main class="admin-main">
        <!-- Top Bar -->
        <div class="admin-topbar">
            <div class="topbar-left">
                <h1 class="page-title">Dashboard</h1>
            </div>
            <div class="topbar-right">
     
               
            </div>
        </div>

        <!-- Content Area -->
        <div class="admin-content">
            <!-- Overview Cards -->
            <section class="dashboard-section">
                <h2 class="section-title">Overview</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Total Users</p>
                            <h3 class="stat-value"><?php echo $totalUsers; ?></h3>
                            <p class="stat-change">Active accounts</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Faculty & Staff</p>
                            <h3 class="stat-value"><?php echo $totalFaculty; ?></h3>
                            <p class="stat-change">Total members</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zM22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Programs</p>
                            <h3 class="stat-value"><?php echo $totalPrograms; ?></h3>
                            <p class="stat-change">Academic programs</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-success">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <p class="stat-label">Events</p>
                            <h3 class="stat-value"><?php echo $totalEvents; ?></h3>
                            <p class="stat-change">Total events</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Quick Actions -->
            <section class="dashboard-section">
                <h2 class="section-title">Quick Actions</h2>
                <div class="actions-grid">
                    <a href="articles.php" class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <span>Manage Articles</span>
                    </a>
                    <a href="events.php" class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>Manage Events</span>
                    </a>
                    <a href="achievements.php" class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 9v12M18 9v12M9 20h6M7.5 4h9l-1 6H8.5l-1-6z"></path>
                        </svg>
                        <span>Manage Achievements</span>
                    </a>
                    <a href="curricula_programs.php" class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zM22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        <span>Manage Programs</span>
                    </a>
                </div>
            </section>

            <!-- Recent Activities -->
            <section class="dashboard-section">
                <h2 class="section-title">Recent Activities</h2>
                <div class="activities-list">
                    <?php if (!empty($activities)): ?>
                        <?php foreach ($activities as $activity): ?>
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <?php if ($activity['type'] === 'article'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    <?php elseif ($activity['type'] === 'event'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                    <?php elseif ($activity['type'] === 'achievement'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 9v12M18 9v12M9 20h6M7.5 4h9l-1 6H8.5l-1-6z"></path>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div class="activity-content">
                                    <p class="activity-title"><?php echo htmlspecialchars($activity['title']); ?></p>
                                    <p class="activity-description"><?php echo htmlspecialchars($activity['description']); ?> by <strong><?php echo htmlspecialchars($activity['user_name']); ?></strong> (<?php echo htmlspecialchars($activity['user_role']); ?>)</p>
                                    <p class="activity-time"><?php echo timeAgo($activity['date']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="activity-item">
                            <div class="activity-content">
                                <p class="activity-title">No activities yet</p>
                                <p class="activity-description">Start by creating articles, events, or achievements</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>
</html>
