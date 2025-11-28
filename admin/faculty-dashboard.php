<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/summernote/dist/summernote-bs5.min.css" rel="stylesheet">
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
            background: #f8f9fa;
            border-left: 4px solid var(--color-primary);
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }
        .content-card:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
    
    $success = '';
    $error = '';
    
    // Handle content creation
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        $type = $_POST['type'] ?? '';
        
        if ($action === 'create') {
            try {
                if ($type === 'article') {
                    $title = $_POST['title'] ?? '';
                    $overview = $_POST['overview'] ?? '';
                    $content = $_POST['content'] ?? '';
                    $author = $currentUser['name'];
                    $imgPath = $_POST['imgPath'] ?? '';
                    
                    if (!empty($title) && !empty($content)) {
                        $articlesModule->createArticle($title, $overview, $content, $author, $imgPath, $currentUser['id']);
                        $success = 'Article created successfully!';
                    } else {
                        $error = 'Please fill in all required fields';
                    }
                } elseif ($type === 'event') {
                    $title = $_POST['title'] ?? '';
                    $overview = $_POST['overview'] ?? '';
                    $content = $_POST['content'] ?? '';
                    $date = $_POST['date'] ?? '';
                    $location = $_POST['location'] ?? '';
                    $imgPath = $_POST['imgPath'] ?? '';
                    
                    if (!empty($title) && !empty($date)) {
                        $eventsModule->createEvent($title, $overview, $content, $date, $location, $imgPath, $currentUser['id']);
                        $success = 'Event created successfully!';
                    } else {
                        $error = 'Please fill in all required fields';
                    }
                } elseif ($type === 'achievement') {
                    $title = $_POST['title'] ?? '';
                    $overview = $_POST['overview'] ?? '';
                    $content = $_POST['content'] ?? '';
                    $imgPath = $_POST['imgPath'] ?? '';
                    
                    if (!empty($title)) {
                        $achievementsModule->createAchievement($title, $overview, $content, $imgPath, $currentUser['id']);
                        $success = 'Achievement created successfully!';
                    } else {
                        $error = 'Please fill in all required fields';
                    }
                }
                
                // Refresh data
                if (!$error) {
                    $allArticles = $articlesModule->fetchArticles();
                    $allEvents = $eventsModule->fetchEvents();
                    $allAchievements = $achievementsModule->fetchAchievements();
                    
                    $userArticles = array_filter($allArticles, function($article) use ($currentUser) {
                        return isset($article['created_by']) && $article['created_by'] == $currentUser['id'];
                    });
                    
                    $userEvents = array_filter($allEvents, function($event) use ($currentUser) {
                        return isset($event['created_by']) && $event['created_by'] == $currentUser['id'];
                    });
                    
                    $userAchievements = array_filter($allAchievements, function($achievement) use ($currentUser) {
                        return isset($achievement['created_by']) && $achievement['created_by'] == $currentUser['id'];
                    });
                }
            } catch (Exception $e) {
                $error = 'Error: ' . $e->getMessage();
            }
        }
    }
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

            <!-- Success/Error Messages -->
            <?php if (!empty($success)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $success ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <!-- Section 1: View All Content -->
            <div class="dashboard-section">
                <h2>📚 View All Content</h2>
                
                <!-- All Articles -->
                <h4 class="mt-4 mb-3">Articles (<?php echo count($allArticles); ?>)</h4>
                <div class="row">
                    <?php if (count($allArticles) > 0) { ?>
                        <?php foreach ($allArticles as $article) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($article['title']); ?></h5>
                                    <p class="card-meta">By: <?php echo htmlspecialchars($article['author']); ?></p>
                                    <p><?php echo htmlspecialchars(substr($article['overview'], 0, 100) . '...'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">No articles found</div>
                        </div>
                    <?php } ?>
                </div>

                <!-- All Events -->
                <h4 class="mt-4 mb-3">Events (<?php echo count($allEvents); ?>)</h4>
                <div class="row">
                    <?php if (count($allEvents) > 0) { ?>
                        <?php foreach ($allEvents as $event) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($event['title']); ?></h5>
                                    <p class="card-meta">📅 <?php echo date('M d, Y', strtotime($event['date'])); ?> | 📍 <?php echo htmlspecialchars($event['location'] ?? 'TBA'); ?></p>
                                    <p><?php echo htmlspecialchars(substr($event['overview'], 0, 100) . '...'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">No events found</div>
                        </div>
                    <?php } ?>
                </div>

                <!-- All Achievements -->
                <h4 class="mt-4 mb-3">Achievements (<?php echo count($allAchievements); ?>)</h4>
                <div class="row">
                    <?php if (count($allAchievements) > 0) { ?>
                        <?php foreach ($allAchievements as $achievement) { ?>
                            <div class="col-md-6 mb-3">
                                <div class="content-card">
                                    <h5><?php echo htmlspecialchars($achievement['title']); ?></h5>
                                    <p><?php echo htmlspecialchars(substr($achievement['overview'], 0, 100) . '...'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="no-content">No achievements found</div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Section 2: My Content -->
            <div class="dashboard-section">
                <h2>✏️ My Content (Editable)</h2>
                
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

            <!-- Section 3: Create New Content -->
            <div class="dashboard-section">
                <h2>➕ Create New Content</h2>
                
                <ul class="nav nav-tabs mb-4" id="createTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="article-tab" data-bs-toggle="tab" data-bs-target="#article-form" type="button">New Article</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="event-tab" data-bs-toggle="tab" data-bs-target="#event-form" type="button">New Event</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="achievement-tab" data-bs-toggle="tab" data-bs-target="#achievement-form" type="button">New Achievement</button>
                    </li>
                </ul>

                <div class="tab-content" id="createTabContent">
                    <!-- Create Article -->
                    <div class="tab-pane fade show active" id="article-form" role="tabpanel">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <input type="hidden" name="type" value="article">
                            
                            <div class="mb-3">
                                <label for="article-title" class="form-label">Article Title</label>
                                <input type="text" class="form-control" id="article-title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="article-overview" class="form-label">Overview</label>
                                <textarea class="form-control" id="article-overview" name="overview" rows="3"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="article-content" class="form-label">Content</label>
                                <textarea class="summernote" id="article-content" name="content"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="article-img" class="form-label">Featured Image Path</label>
                                <input type="text" class="form-control" id="article-img" name="imgPath" placeholder="/uploads/articles/image.jpg">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create Article</button>
                        </form>
                    </div>

                    <!-- Create Event -->
                    <div class="tab-pane fade" id="event-form" role="tabpanel">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <input type="hidden" name="type" value="event">
                            
                            <div class="mb-3">
                                <label for="event-title" class="form-label">Event Title</label>
                                <input type="text" class="form-control" id="event-title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="event-date" class="form-label">Event Date</label>
                                <input type="datetime-local" class="form-control" id="event-date" name="date" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="event-location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="event-location" name="location">
                            </div>
                            
                            <div class="mb-3">
                                <label for="event-overview" class="form-label">Overview</label>
                                <textarea class="form-control" id="event-overview" name="overview" rows="3"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="event-content" class="form-label">Content</label>
                                <textarea class="summernote" id="event-content" name="content"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="event-img" class="form-label">Featured Image Path</label>
                                <input type="text" class="form-control" id="event-img" name="imgPath" placeholder="/uploads/events/image.jpg">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create Event</button>
                        </form>
                    </div>

                    <!-- Create Achievement -->
                    <div class="tab-pane fade" id="achievement-form" role="tabpanel">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <input type="hidden" name="type" value="achievement">
                            
                            <div class="mb-3">
                                <label for="achievement-title" class="form-label">Achievement Title</label>
                                <input type="text" class="form-control" id="achievement-title" name="title" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="achievement-overview" class="form-label">Overview</label>
                                <textarea class="form-control" id="achievement-overview" name="overview" rows="3"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="achievement-content" class="form-label">Content</label>
                                <textarea class="summernote" id="achievement-content" name="content"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="achievement-img" class="form-label">Achievement Image Path</label>
                                <input type="text" class="form-control" id="achievement-img" name="imgPath" placeholder="/uploads/achievements/image.jpg">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create Achievement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>

    <?php include('../includes/footer.php'); ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs5.min.js"></script>
    <script src="../includes/summernote.php"></script>
</body>
</html>
