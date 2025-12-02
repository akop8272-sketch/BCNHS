<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$programsModule = new ProgramsModule();

$id = $_GET['id'];
$program = $programsModule->getProgram($id);

if ($program) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'program', $id, $program['title'] ?? 'Program');
    
    $programsModule->deleteProgram($id);
}
header("Location: curricula_programs.php");
?>
