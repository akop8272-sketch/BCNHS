<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$programsModule = new ProgramsModule();
$id = $_GET['id'];
$program = $programsModule->getProgram($id);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $content = $_POST['content'];
    $filename = $program['imgPath']; // Keep existing image by default

    // Handle file upload only if a file was provided
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "../uploads/programs/";
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
        if (!in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
            echo "
            <script>
                alert('Invalid file type. Only PNG, JPG, JPEG, and GIF are allowed.');
                window.location.href = 'curricula_programs.php';
            </script>
            ";
            exit();
        }
        
        $unique_filename = uniqid() . "." . $extension;
        $targetFile = $targetDir . $unique_filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $filename = $unique_filename; // Use new filename only if upload successful
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'curricula_programs.php';
            </script>
            ";
            exit();
        }
    }
    
    $programsModule->updateProgram($id, $title, $overview, $content, $filename);
    echo "
    <script>
        alert('Program updated successfully.');
        window.location.href = 'curricula_programs.php';
    </script>";
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
                <!-- Edit Program Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 0; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); overflow: hidden;">
                        <!-- Cover Photo Section -->
                        <div style="width: 100%; height: 400px; overflow: hidden; background: var(--color-background);">
                            <img src="../uploads/programs/<?php echo $program['imgPath'] ?>" alt="Program Cover" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        
                        <div style="padding: 1.5rem; text-align: center; background: var(--color-background); border-bottom: 1px solid var(--color-border);">
                            <p style="font-size: 0.875rem; font-weight: 600; color: var(--color-text-secondary); margin: 0;">Current Cover Image</p>
                        </div>
                        
                        <!-- Form Section -->
                        <div style="padding: 2rem;">
                            <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 2rem;">Edit Program</h2>
                            
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $program['id'] ?>">
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Program Title</label>
                                    <input type="text" value="<?php echo $program['title'] ?>" name="title" placeholder="Enter Program Title" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Overview</label>
                                    <textarea name="overview" placeholder="Enter Program Overview" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 100px;"><?php echo $program['overview'] ?></textarea>
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Content</label>
                                    <textarea name="content" placeholder="Enter Program Content" required class="summernote" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 150px;"><?php echo $program['content'] ?></textarea>
                                </div>
                                
                                <div style="margin-bottom: 1.5rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Cover Image</label>
                                    <input type="file" value="<?php $program['imgPath'] ?>" name="image" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Upload a new cover image to replace the current one</p>
                                </div>
                                
                                <div style="display: flex; gap: 1rem; justify-content: center;">
                                    <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update</button>
                                    <a href="curricula_programs.php" class="btn btn-secondary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 8px; display: inline-block;">Cancel</a>
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
