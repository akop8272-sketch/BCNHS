<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$facultyModule = new FacultyStaffModule();

$id = $_GET['id'];
$staff = $facultyModule->getFacultyStaff($id);

if ($staff) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'faculty_staff', $id, $staff['name'] ?? 'Staff Member');
    
    $facultyModule->deleteFacultyStaff($id);
}
header("Location: faculties_staff.php");
?>