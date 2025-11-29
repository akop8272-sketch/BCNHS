<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$activityLogModule = new ActivityLogModule();

// Get filter parameters
$action_filter = isset($_GET['action']) ? $_GET['action'] : '';
$content_type_filter = isset($_GET['content_type']) ? $_GET['content_type'] : '';
$user_filter = isset($_GET['user_id']) ? $_GET['user_id'] : '';

// Get all recent activities (we'll fetch more for pagination)
$recentActivities = $activityLogModule->getRecentActivities(1000);

// Apply filters
$filteredActivities = [];
foreach ($recentActivities as $activity) {
    $include = true;
    
    if (!empty($action_filter) && $activity['action'] !== $action_filter) {
        $include = false;
    }
    
    if (!empty($content_type_filter) && $activity['content_type'] !== $content_type_filter) {
        $include = false;
    }
    
    if (!empty($user_filter) && $activity['user_id'] != $user_filter) {
        $include = false;
    }
    
    if ($include) {
        $filteredActivities[] = $activity;
    }
}

// Pagination
$per_page = 20;
$total_pages = ceil(count($filteredActivities) / $per_page);
$current_page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start_index = ($current_page - 1) * $per_page;
$paginated_activities = array_slice($filteredActivities, $start_index, $per_page);

// Get unique values for filters
$all_activities = $activityLogModule->getRecentActivities(1000);
$unique_actions = [];
$unique_types = [];
$unique_users = [];

foreach ($all_activities as $activity) {
    if (!in_array($activity['action'], $unique_actions)) {
        $unique_actions[] = $activity['action'];
    }
    if (!in_array($activity['content_type'], $unique_types)) {
        $unique_types[] = $activity['content_type'];
    }
    if (!in_array(['id' => $activity['user_id'], 'name' => $activity['user_name']], $unique_users, true)) {
        $unique_users[] = ['id' => $activity['user_id'], 'name' => $activity['user_name']];
    }
}

// Format activities for display
$activities = [];
foreach ($paginated_activities as $activity) {
    $actionText = '';
    switch($activity['action']) {
        case 'created':
            $actionText = 'Created';
            $icon_color = 'var(--color-success)';
            break;
        case 'updated':
            $actionText = 'Updated';
            $icon_color = 'var(--color-info)';
            break;
        case 'deleted':
            $actionText = 'Deleted';
            $icon_color = 'var(--color-danger)';
            break;
        default:
            $actionText = ucfirst($activity['action']);
            $icon_color = 'var(--color-text)';
    }
    
    $activities[] = [
        'id' => $activity['id'],
        'type' => $activity['content_type'],
        'title' => $activity['content_title'] ?? 'Untitled',
        'action' => $actionText,
        'action_raw' => $activity['action'],
        'date' => $activity['created_at'],
        'user_name' => $activity['user_name'] ?? 'Unknown',
        'user_role' => $activity['user_role'] ?? 'Unknown',
        'icon_color' => $icon_color
    ];
}

function timeAgo($date) {
    $timestamp = strtotime($date);
    $difference = time() - $timestamp;
    
    if ($difference < 60) {
        return $difference . ' seconds ago';
    } elseif ($difference < 3600) {
        return floor($difference / 60) . ' minutes ago';
    } elseif ($difference < 86400) {
        return floor($difference / 3600) . ' hours ago';
    } elseif ($difference < 604800) {
        return floor($difference / 86400) . ' days ago';
    } else {
        return date('M d, Y H:i', $timestamp);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs - BCNHS Admin</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .log-entry {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid var(--color-border);
            transition: background-color 0.2s;
        }
        
        .log-entry:hover {
            background-color: rgba(var(--color-primary-rgb), 0.05);
        }
        
        .log-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .log-content {
            flex: 1;
            min-width: 0;
        }
        
        .log-title {
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: 0.25rem;
        }
        
        .log-description {
            font-size: 0.875rem;
            color: var(--color-text-secondary);
            margin-bottom: 0.25rem;
        }
        
        .log-time {
            font-size: 0.75rem;
            color: var(--color-text-tertiary);
        }
        
        .filter-section {
            background: var(--color-surface);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(12, 22, 43, 0.06);
        }
        
        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-group label {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--color-text);
            margin-bottom: 0.5rem;
        }
        
        .filter-group select {
            padding: 0.5rem;
            border: 1px solid var(--color-border);
            border-radius: 4px;
            font-size: 0.875rem;
        }
        
        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: flex-end;
        }
        
        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }
        
        .pagination a,
        .pagination span {
            color: var(--color-primary);
            text-decoration: none;
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--color-border);
            border-radius: 4px;
            margin: 0 0.25rem;
            display: inline-block;
        }
        
        .pagination a:hover {
            background-color: var(--color-primary);
            color: white;
        }
        
        .pagination .active {
            background-color: var(--color-primary);
            color: white;
            border-color: var(--color-primary);
        }
        
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-box {
            background: var(--color-surface);
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(12, 22, 43, 0.06);
        }
        
        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-primary);
        }
        
        .stat-label {
            font-size: 0.75rem;
            color: var(--color-text-secondary);
            text-transform: uppercase;
            margin-top: 0.25rem;
        }
    </style>
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
                    <h1 class="page-title">Activity Logs</h1>
                </div>
                <div class="topbar-right">
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Statistics -->
                <div class="stats-row">
                    <div class="stat-box">
                        <div class="stat-number"><?php echo count($filteredActivities); ?></div>
                        <div class="stat-label">Total Activities</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number"><?php echo count(array_filter($filteredActivities, fn($a) => $a['action'] === 'created')); ?></div>
                        <div class="stat-label">Created</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number"><?php echo count(array_filter($filteredActivities, fn($a) => $a['action'] === 'updated')); ?></div>
                        <div class="stat-label">Updated</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number"><?php echo count(array_filter($filteredActivities, fn($a) => $a['action'] === 'deleted')); ?></div>
                        <div class="stat-label">Deleted</div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="filter-section">
                    <h3 style="margin-bottom: 1rem; font-weight: 600;">Filter Logs</h3>
                    <form method="get" action="">
                        <div class="filter-row">
                            <div class="filter-group">
                                <label for="action">Action</label>
                                <select name="action" id="action">
                                    <option value="">All Actions</option>
                                    <?php foreach ($unique_actions as $action): ?>
                                        <option value="<?php echo $action; ?>" <?php echo $action_filter === $action ? 'selected' : ''; ?>>
                                            <?php echo ucfirst($action); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label for="content_type">Content Type</label>
                                <select name="content_type" id="content_type">
                                    <option value="">All Types</option>
                                    <?php foreach ($unique_types as $type): ?>
                                        <option value="<?php echo $type; ?>" <?php echo $content_type_filter === $type ? 'selected' : ''; ?>>
                                            <?php echo ucfirst($type); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label for="user_id">User</label>
                                <select name="user_id" id="user_id">
                                    <option value="">All Users</option>
                                    <?php foreach ($unique_users as $user): ?>
                                        <option value="<?php echo $user['id']; ?>" <?php echo $user_filter == $user['id'] ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($user['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="filter-buttons">
                            <button type="submit" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Apply Filters</button>
                            <a href="activity_logs.php" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.875rem; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 4px; display: inline-block;">Clear Filters</a>
                        </div>
                    </form>
                </div>

                <!-- Activity Logs List -->
                <div style="background: var(--color-surface); border-radius: 8px; box-shadow: 0 2px 8px rgba(12, 22, 43, 0.06); overflow: hidden;">
                    <?php if (!empty($activities)): ?>
                        <?php foreach ($activities as $activity): ?>
                            <div class="log-entry">
                                <div class="log-icon" style="background-color: <?php echo $activity['icon_color']; ?>20; color: <?php echo $activity['icon_color']; ?>;">
                                    <?php if ($activity['action_raw'] === 'created'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    <?php elseif ($activity['action_raw'] === 'updated'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    <?php elseif ($activity['action_raw'] === 'deleted'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div class="log-content">
                                    <div class="log-title">
                                        <?php echo htmlspecialchars($activity['title']); ?>
                                    </div>
                                    <div class="log-description">
                                        <strong><?php echo $activity['action']; ?></strong> <?php echo ucfirst($activity['type']); ?> by <strong><?php echo htmlspecialchars($activity['user_name']); ?></strong>
                                        (<?php echo htmlspecialchars($activity['user_role']); ?>)
                                    </div>
                                    <div class="log-time">
                                        <?php echo timeAgo($activity['date']); ?> • <?php echo date('M d, Y H:i', strtotime($activity['date'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Pagination -->
                        <?php if ($total_pages > 1): ?>
                            <div class="pagination">
                                <?php if ($current_page > 1): ?>
                                    <a href="?page=1<?php echo $action_filter ? '&action=' . urlencode($action_filter) : ''; ?><?php echo $content_type_filter ? '&content_type=' . urlencode($content_type_filter) : ''; ?><?php echo $user_filter ? '&user_id=' . urlencode($user_filter) : ''; ?>">First</a>
                                    <a href="?page=<?php echo $current_page - 1; ?><?php echo $action_filter ? '&action=' . urlencode($action_filter) : ''; ?><?php echo $content_type_filter ? '&content_type=' . urlencode($content_type_filter) : ''; ?><?php echo $user_filter ? '&user_id=' . urlencode($user_filter) : ''; ?>">Previous</a>
                                <?php endif; ?>

                                <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
                                    <?php if ($i === $current_page): ?>
                                        <span class="active"><?php echo $i; ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?php echo $i; ?><?php echo $action_filter ? '&action=' . urlencode($action_filter) : ''; ?><?php echo $content_type_filter ? '&content_type=' . urlencode($content_type_filter) : ''; ?><?php echo $user_filter ? '&user_id=' . urlencode($user_filter) : ''; ?>"><?php echo $i; ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($current_page < $total_pages): ?>
                                    <a href="?page=<?php echo $current_page + 1; ?><?php echo $action_filter ? '&action=' . urlencode($action_filter) : ''; ?><?php echo $content_type_filter ? '&content_type=' . urlencode($content_type_filter) : ''; ?><?php echo $user_filter ? '&user_id=' . urlencode($user_filter) : ''; ?>">Next</a>
                                    <a href="?page=<?php echo $total_pages; ?><?php echo $action_filter ? '&action=' . urlencode($action_filter) : ''; ?><?php echo $content_type_filter ? '&content_type=' . urlencode($content_type_filter) : ''; ?><?php echo $user_filter ? '&user_id=' . urlencode($user_filter) : ''; ?>">Last</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div style="padding: 2rem; text-align: center; color: var(--color-text-secondary);">
                            <p>No activities found matching the selected filters.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php');
    ?>
</body>
</html>
