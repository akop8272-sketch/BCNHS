<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$facultyModule = new FacultyStaffModule();

$id = $_GET['id'];
$facultyModule->deleteFacultyStaff($id);
header("Location: faculties_staff.php");
?>