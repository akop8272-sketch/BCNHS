<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$programsModule = new ProgramsModule();

$id = $_GET['id'];
$programsModule->deleteProgram($id);
header("Location: curricula_programs.php");
?>
