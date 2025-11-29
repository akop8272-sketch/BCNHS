<?php
include('../includes/auth.php');
// Allow both Admin and Faculty to delete, with ownership checks
requireAdminOrFaculty();

include('../functions/functions.php');
$eventsModule = new EventsModule();
$currentUser  = getCurrentUser();
$isAdmin      = hasRole('Admin');
$isFaculty    = hasRole('Faculty');

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No event selected.');
        window.location.href = 'events.php';
    </script>";
    exit();
}

$id    = $_GET['id'];
$event = $eventsModule->getEvent($id);

if (!$event) {
    echo "
    <script>
        alert('Event not found.');
        window.location.href = 'events.php';
    </script>";
    exit();
}

// If faculty (not admin), ensure they can only delete their own event
if ($isFaculty && !$isAdmin) {
    if (!isset($event['created_by']) || $event['created_by'] != $currentUser['id']) {
        echo "
        <script>
            alert('You are not allowed to delete this event.');
            window.location.href = 'events.php';
        </script>";
        exit();
    }
}

// Log activity before deletion
$activityLog = new ActivityLogModule();
$activityLog->logActivity($currentUser['id'], 'deleted', 'event', $id, $event['title']);

$eventsModule->deleteEvent($id);

echo "
<script>
    alert('Event deleted successfully.');
    window.location.href = 'events.php';
</script>";
exit();
