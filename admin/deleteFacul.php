<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$facultyModule = new FacultyModule();

$id = $_GET['id'];
$facultyModule->deleteFaculty($id);
header("Location: faculties_staff.php");
?>
