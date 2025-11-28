<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$servicesModule = new ServicesModule();
$id = $_GET['id'];
$service = $servicesModule->getService($id);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $location = $_POST['location'];

    // Handle file upload
    $filename = $_FILES["image"]["name"];
    $targetDir = "../uploads/services/";
    $targetFile = $targetDir . basename($filename);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['image']['tmp_name'];
    if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
        echo "
        <script>
            alert('Invalid file type. Only PNG, JPG, JPEG, and GIF are allowed.');
            window.location.href = 'services.php';
        </script>
        ";
        exit();
    } else {
        if (move_uploaded_file($file, $targetFile)) {
            $servicesModule->updateService($id, $title, $content, $location, $filename);
            echo "
            <script>
                alert('Service updated successfully.');
                window.location.href = 'services.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'services.php';
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
                    <h1 class="page-title">Dashboard</h1>
                </div>
                <div class="topbar-right">

                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>
            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Edit Service Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 0; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); overflow: hidden;">
                        <!-- Cover Photo Section -->
                        <div style="width: 100%; padding: 3rem 0; display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, var(--color-background), var(--color-surface));">
                            <img src="../uploads/services/<?php echo $service['imgPath'] ?>" alt="Service Icon" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; border: 4px solid var(--color-primary); box-shadow: 0 8px 24px rgba(12, 22, 43, 0.12);">
                        </div>
                        
                        <div style="padding: 1.5rem; text-align: center; background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                            <p style="font-size: 0.875rem; font-weight: 600; color: var(--color-text-secondary); margin: 0;">Current Service Icon</p>
                        </div>
                        
                        <!-- Form Section -->
                        <div style="padding: 2rem;">
                            <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 2rem;">Edit Service</h2>
                            
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $service['id'] ?>">
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Service Title</label>
                                    <input type="text" value="<?php echo $service['title'] ?>" name="title" placeholder="Enter Service Title" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Content</label>
                                    <textarea name="content" placeholder="Enter Service Content" required class="summernote" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 150px;"><?php echo $service['content'] ?></textarea>
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Location</label>
                                    <input type="text" value="<?php echo $service['location'] ?>" name="location" placeholder="Enter Service Location" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                </div>
                                
                                <div style="margin-bottom: 1.5rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Service Image</label>
                                    <input type="file" name="image" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Upload a new image to replace the current one</p>
                                </div>
                                
                                <div style="display: flex; gap: 1rem; justify-content: center;">
                                    <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update</button>
                                    <a href="services.php" class="btn btn-secondary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 8px; display: inline-block;">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
    
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
</body>

</html>
