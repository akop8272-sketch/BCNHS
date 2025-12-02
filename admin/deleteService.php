<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$servicesModule = new ServicesModule();

$id = $_GET['id'];
$service = $servicesModule->getService($id);

if ($service) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'service', $id, $service['title'] ?? 'Service');
    
    $servicesModule->deleteService($id);
}
header("Location: services.php");
?>
