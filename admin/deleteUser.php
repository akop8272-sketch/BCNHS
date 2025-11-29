<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$usersModule = new UsersModule();

$id = $_GET['id'];
$user = $usersModule->getUser($id);

if ($user) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'user', $id, $user['name'] ?? 'User');
    
    $usersModule->deleteUser($id);
}
header("Location: users.php");
?>
