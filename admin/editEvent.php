<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$eventsModule = new EventsModule();

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No event selected.');
        window.location.href = 'events.php';
    </script>";
    exit();
}

$id = $_GET['id'];
$event = $eventsModule->getEvent($id);

if (!$event) {
    echo "
    <script>
        alert('Event not found.');
        window.location.href = 'events.php';
    </script>";
    exit();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $imgPath = $event['imgPath']; // Start with current image

    // Handle file upload only if new file is provided
    if (!empty($_FILES["image"]["name"])) {
        $filename = $_FILES["image"]["name"];
        $targetDir = "../uploads/events/";
        $targetFile = $targetDir . basename($filename);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['image']['tmp_name'];
        if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
            echo "
            <script>
                alert('Invalid file type. Only PNG, JPG, JPEG, GIF, and WEBP are allowed.');
                window.location.href = 'editEvent.php?id=$id';
            </script>
            ";
            exit();
        } else {
            if (move_uploaded_file($file, $targetFile)) {
                $imgPath = $filename;
            } else {
                echo "
                <script>
                    alert('Error uploading file.');
                    window.location.href = 'editEvent.php?id=$id';
                </script>
                ";
                exit();
            }
        }
    }

    $eventsModule->updateEvent($id, $title, $overview, $content, $date, $location, $imgPath);
    echo "
    <script>
        alert('Event updated successfully.');
        window.location.href = 'events.php';
    </script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - BCNHS</title>
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
                    <h1 class="page-title">Edit Event</h1>
                </div>
                <div class="topbar-right">

                    <div class="admin-profile">
                        <span class=\"profile-name\"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Edit Event Card -->
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); margin-bottom: 2rem;">
                    <!-- Current Event Image -->
                    <div style="margin-bottom: 2rem; text-align: center;">
                        <div style="display: inline-block; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.15); background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 1px;">
                            <img src="../uploads/events/<?php echo $event['imgPath'] ?>" alt="<?php echo $event['title'] ?>" style="width: 400px; height: auto; display: block; object-fit: cover; border-radius: 11px;">
                        </div>
                        <p style="margin-top: 1rem; font-size: 0.875rem; color: var(--color-text-secondary);">Current Event Image</p>
                    </div>

                    <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">Edit Event</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Event Title</label>
                            <input type="text" name="title" placeholder="Enter Event Title" value="<?php echo htmlspecialchars($event['title']) ?>" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">The name of the event. Make it descriptive and clear.</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Overview</label>
                            <textarea name="overview" placeholder="Enter Event Overview" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 80px;"><?php echo htmlspecialchars($event['overview']) ?></textarea>
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">A brief summary of what the event is about (1-2 sentences).</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Content</label>
                            <textarea name="content" id="event-editor" placeholder="Enter Event Content" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 200px;"><?php echo htmlspecialchars($event['content']) ?></textarea>
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Full event details including schedule, activities, and important information.</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Date & Time</label>
                            <input type="datetime-local" name="date" value="<?php echo $event['date'] ?>" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">When the event will take place or when it occurred.</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Location</label>
                            <input type="text" name="location" placeholder="Enter Event Location" value="<?php echo htmlspecialchars($event['location']) ?>" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Where the event takes place (venue name, building, or location details).</p>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Event Image (Optional)</label>
                            <input type="file" name="image" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Leave empty to keep current image. Accepted formats: PNG, JPG, JPEG, GIF, WEBP</p>
                        </div>
                        <div style="display: flex; gap: 1rem;">
                            <button type="submit" name="update" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update Event</button>
                            <a href="events.php" class="btn btn-tertiary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none;">Cancel</a>
                        </div>
                    </form>
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
