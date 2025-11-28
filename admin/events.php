<?php
include('../includes/auth.php');
requireAdminOrFaculty();

include('../functions/functions.php');
$eventsModule = new EventsModule();
$currentUser = getCurrentUser();
$isAdmin = hasRole('Admin');
$isFaculty = hasRole('Faculty');

// Get all events or only user's events based on role
$allEvents = $eventsModule->fetchEvents();
if ($isFaculty && !$isAdmin) {
    // Faculty sees only their own events
    $events = array_filter($allEvents, function($event) use ($currentUser) {
        return isset($event['created_by']) && $event['created_by'] == $currentUser['id'];
    });
} else {
    // Admin sees all events
    $events = $allEvents;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include('../includes/summernote.php'); ?>

</head>

<body>
    <?php include('../includes/header.php') ?>

    <div class="admin-body">
        <?php include('../includes/admin_sidebar.php') ?>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Top Bar -->
            <div class="admin-topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Manage Events</h1>
                </div>
                <div class="topbar-right">
                    <a href="addEvent.php" class="btn btn-primary">+ Add New Event</a>
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>
            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- List of Events Card -->
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08);">
                    <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">List of Events</h2>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: white;">
                            <tr>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Title</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Created By</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Date</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Location</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Image</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event) { ?>
                                <tr style="border-bottom: 1px solid var(--color-border); transition: background 0.3s ease;">
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $event['title'] ?></td>
                                    <td style="padding: 1rem; color: var(--color-text);">                                        <?php 
                                            $usersModule = new UsersModule();
                                            $creator = $usersModule->getUser($event['created_by']);
                                            echo $creator ? $creator['name'] : 'Unknown';
                                        ?>
                                    </td>
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $event['date'] ?></td>
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $event['location'] ?></td>
                                    <td style="padding: 1rem;"><img src="../uploads/events/<?php echo $event['imgPath'] ?>" alt="<?php echo $event['title'] ?>" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;"></td>
                                    <td style="padding: 1rem;">
                                        <a href="editEvent.php?id=<?php echo $event['id'] ?>" class="btn btn-tertiary" style="padding: 0.5rem 1rem; margin-right: 0.5rem; border-radius: 6px; text-decoration: none;">Edit</a>
                                        <a href="deleteEvent.php?id=<?php echo $event['id'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this event?');" style="padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none;">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </main>
    </div>

    <script>
        function uploadImage(file, editor) {
            const formData = new FormData();
            formData.append('image', file);
            
            $.ajax({
                url: '../upload-image.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.success) {
                        editor.summernote('insertImage', data.url);
                    } else {
                        alert('Image upload failed: ' + data.error);
                    }
                },
                error: function() {
                    alert('Error uploading image');
                }
            });
        }
    </script>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>

</html>
