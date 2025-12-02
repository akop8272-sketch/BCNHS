<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .dashboard-section {
            margin-bottom: 3rem;
        }
        .dashboard-section h2 {
            border-bottom: 3px solid var(--color-primary);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        .content-card {
            background: var(--color-bg);
            border-left: 4px solid var(--color-primary);
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(12, 22, 43, 0.06);
            transition: all 0.25s ease;
        }
        .content-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(12, 22, 43, 0.12);
        }
        .content-card h5 {
            color: var(--color-primary);
            font-weight: 600;
        }
        .content-card .card-meta {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        .btn-group-sm {
            margin-top: 1rem;
        }
        .no-content {
            padding: 2rem;
            text-align: center;
            background: #f8f9fa;
            border-radius: 0.5rem;
            color: #6c757d;
        }
        .quick-actions {
            margin-bottom: 2.5rem;
        }
        .quick-card {
            background: var(--color-surface);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 6px 18px rgba(12, 22, 43, 0.08);
            border: 1px solid var(--color-border);
            height: 100%;
            transition: all 0.25s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .quick-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(12, 22, 43, 0.12);
            border-color: var(--color-primary);
            text-decoration: none;
        }
        .quick-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--color-text);
        }
        .quick-card-desc {
            font-size: 0.9rem;
            color: var(--color-muted);
            margin-bottom: 0.75rem;
        }
        .quick-card-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #fff;
            background: var(--color-primary);
        }
    </style>
</head>
<body>
    <?php 
    include('../includes/auth.php');
    include('../functions/functions.php');
    
    // Require Faculty role
    requireFaculty();
    
    $currentUser = getCurrentUser();
    $articlesModule = new ArticlesModule();
    $eventsModule = new EventsModule();
    $achievementsModule = new AchievementsModule();
    
    // Get all content for Section 1
    $allArticles = $articlesModule->fetchArticles();
    $allEvents = $eventsModule->fetchEvents();
    $allAchievements = $achievementsModule->fetchAchievements();
    
    // Get user-created content for Section 2
    $userArticles = array_filter($allArticles, function($article) use ($currentUser) {
        return isset($article['created_by']) && $article['created_by'] == $currentUser['id'];
    });
    
    $userEvents = array_filter($allEvents, function($event) use ($currentUser) {
        return isset($event['created_by']) && $event['created_by'] == $currentUser['id'];
    });
    
    $userAchievements = array_filter($allAchievements, function($achievement) use ($currentUser) {
        return isset($achievement['created_by']) && $achievement['created_by'] == $currentUser['id'];
    });
    ?>

    <?php include('../includes/header.php'); ?>

    <div class="admin-body">
        <?php include('../includes/admin_sidebar.php') ?>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Top Bar -->
            <div class="admin-topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Faculty Dashboard</h1>
                </div>
                <div class="topbar-right">
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
            <!-- Welcome Header -->
            <div class="mb-5">
                <h1 class="display-5 mb-2">Faculty Dashboard</h1>
                <p class="text-muted">Welcome, <strong><?php echo htmlspecialchars($currentUser['name']); ?></strong></p>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="addArticle.php" class="quick-card">
                            <div class="quick-card-badge mb-2">Article</div>
                            <div class="quick-card-title">Create New Article</div>
                            <div class="quick-card-desc">
                                Share news, announcements, and stories with students and parents.
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="addEvent.php" class="quick-card">
                            <div class="quick-card-badge mb-2">Event</div>
                            <div class="quick-card-title">Create New Event</div>
                            <div class="quick-card-desc">
                                Publish upcoming school activities, programs, and important dates.
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="addAchievement.php" class="quick-card">
                            <div class="quick-card-badge mb-2">Achievement</div>
                            <div class="quick-card-title">Add New Achievement</div>
                            <div class="quick-card-desc">
                                Highlight student and school achievements for the community.
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section: My Content -->
            <div class="dashboard-section">
                <h2>My Content (Editable)</h2>
                
                <!-- My Articles -->
                <h4 class="mt-4 mb-3">My Articles (<?php echo count($userArticles); ?>)</h4>
                <div class="row">
                    <?php if (count($userArticles) > 0) { ?>
                        <?php foreach ($userArticles as $article) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($article['title']); ?></h5>
                                    <p><?php echo htmlspecialchars(substr($article['overview'], 0, 100) . '...'); ?></p>
                                    <div class="btn-group-sm btn-group" role="group">
                                        <a href="editArticle.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="deleteArticle.php?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">You haven't created any articles yet</div>
                        </div>
                    <?php } ?>
                </div>

                <!-- My Events -->
                <h4 class="mt-4 mb-3">My Events (<?php echo count($userEvents); ?>)</h4>
                <div class="row">
                    <?php if (count($userEvents) > 0) { ?>
                        <?php foreach ($userEvents as $event) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($event['title']); ?></h5>
                                    <p class="card-meta">📅 <?php echo date('M d, Y', strtotime($event['date'])); ?> | 📍 <?php echo htmlspecialchars($event['location'] ?? 'TBA'); ?></p>
                                    <div class="btn-group-sm btn-group" role="group">
                                        <a href="editEvent.php?id=<?php echo $event['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="deleteEvent.php?id=<?php echo $event['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">You haven't created any events yet</div>
                        </div>
                    <?php } ?>
                </div>

                <!-- My Achievements -->
                <h4 class="mt-4 mb-3">My Achievements (<?php echo count($userAchievements); ?>)</h4>
                <div class="row">
                    <?php if (count($userAchievements) > 0) { ?>
                        <?php foreach ($userAchievements as $achievement) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($achievement['title']); ?></h5>
                                    <p><?php echo htmlspecialchars(substr($achievement['overview'], 0, 100) . '...'); ?></p>
                                    <div class="btn-group-sm btn-group" role="group">
                                        <a href="editAchievement.php?id=<?php echo $achievement['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="deleteAchievement.php?id=<?php echo $achievement['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">You haven't created any achievements yet</div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            </div>
        </div>
        </main>
    </div>

    <?php include('../includes/footer.php'); ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
