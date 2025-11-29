<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$resourcesModule = new ResourcesModule();

$id = $_GET['id'];
$resource = $resourcesModule->getResource($id);

if ($resource) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'resource', $id, $resource['title'] ?? 'Resource');
    
    $resourcesModule->deleteResource($id);
}
header("Location: learning_resources.php");
?>
