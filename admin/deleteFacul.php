<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$facultyModule = new FacultyModule();

$id = $_GET['id'];
$faculty = $facultyModule->getFaculty($id);

if ($faculty) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'faculty', $id, $faculty['name'] ?? 'Faculty');
    
    $facultyModule->deleteFaculty($id);
}
header("Location: faculties_staff.php");
?>
