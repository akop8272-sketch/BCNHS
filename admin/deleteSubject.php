<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$subjectModule = new SubjectModule();

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No subject selected.');
        window.location.href = 'learning_resources.php';
    </script>";
    exit();
}

$id = $_GET['id'];
$subject = $subjectModule->getSubject($id);

if ($subject) {
    // Log activity before deletion
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'deleted', 'subject', $id, $subject['name'] ?? 'Subject');
    
    $subjectModule->deleteSubject($id);
}

echo "
<script>
    alert('Subject deleted successfully.');
    window.location.href = 'learning_resources.php';
</script>";
exit();
