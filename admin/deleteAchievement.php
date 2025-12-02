<?php
include('../includes/auth.php');
// Allow both Admin and Faculty to delete, with ownership checks
requireAdminOrFaculty();

include('../functions/functions.php');
$achievementsModule = new AchievementsModule();
$currentUser        = getCurrentUser();
$isAdmin            = hasRole('Admin');
$isFaculty          = hasRole('Faculty');

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No achievement selected.');
        window.location.href = 'achievements.php';
    </script>";
    exit();
}

$id          = $_GET['id'];
$achievement = $achievementsModule->getAchievement($id);

if (!$achievement) {
    echo "
    <script>
        alert('Achievement not found.');
        window.location.href = 'achievements.php';
    </script>";
    exit();
}

// If faculty (not admin), ensure they can only delete their own achievement
if ($isFaculty && !$isAdmin) {
    if (!isset($achievement['created_by']) || $achievement['created_by'] != $currentUser['id']) {
        echo "
        <script>
            alert('You are not allowed to delete this achievement.');
            window.location.href = 'achievements.php';
        </script>";
        exit();
    }
}

// Log activity before deletion
$activityLog = new ActivityLogModule();
$activityLog->logActivity($currentUser['id'], 'deleted', 'achievement', $id, $achievement['title']);

$achievementsModule->deleteAchievement($id);

echo "
<script>
    alert('Achievement deleted successfully.');
    window.location.href = 'achievements.php';
</script>";
exit();
