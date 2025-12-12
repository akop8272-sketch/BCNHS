<?php
include('../includes/auth.php');
requireAdminOrFaculty();

include('../functions/functions.php');
$achievementsModule = new AchievementsModule();
$currentUser = getCurrentUser();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $content = $_POST['content'];

    // Handle file upload
    $filename = $_FILES["image"]["name"];
    $targetDir = "../uploads/achievements/";
    $targetFile = $targetDir . basename($filename);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['image']['tmp_name'];
    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
        echo "
        <script>
            alert('Invalid file type. Only PNG, JPG, JPEG, GIF, and WEBP are allowed.');
            window.location.href = 'addAchievement.php';
        </script>
        ";
        exit();
    } else {
        if (move_uploaded_file($file, $targetFile)) {
            $achievementId = $achievementsModule->createAchievement($title, $overview, $content, $filename, $currentUser['id']);
            
            // Log activity
            $activityLog = new ActivityLogModule();
            $activityLog->logActivity($currentUser['id'], 'created', 'achievement', $achievementId, $title);
            
            echo "
            <script>
                alert('Achievement added successfully.');
                window.location.href = 'achievements.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'addAchievement.php';
            </script>
            ";
        }
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Achievement - BCNHS</title>
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
                    <h1 class="page-title">Add Achievement</h1>
                </div>
                <div class="topbar-right">
                  
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 900px; margin: 0 auto;">
                    <h1 style="font-size: 2rem; font-weight: 800; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Create New Achievement</h1>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Achievement Title</label>
                            <input type="text" name="title" placeholder="Enter Achievement Title" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">The name of the achievement. Make it descriptive and clear.</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Overview</label>
                            <textarea name="overview" placeholder="Enter Achievement Overview" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 80px;"></textarea>
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">A brief summary of the achievement (1-2 sentences).</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Content</label>
                            <textarea name="content" id="achievement-editor" placeholder="Enter Achievement Content" required class="summernote" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 200px;"></textarea>
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">The full details of the achievement with complete information and context.</p>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Achievement Image</label>
                            <input type="file" name="image" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Accepted formats: PNG, JPG, JPEG, GIF, WEBP</p>
                        </div>
                        
                        <div style="display: flex; gap: 1rem; justify-content: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                            <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px;">Add Achievement</button>
                            <a href="achievements.php" class="btn btn-secondary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--color-border); color: var(--color-text); display: inline-block;">Cancel</a>
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
