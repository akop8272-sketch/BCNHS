<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$aboutModule = new AboutModule();
$about = $aboutModule->getAbout(1);

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $history = $_POST['history'];
    $hymm = $_POST['hymm'];

    if($aboutModule->updateAbout($id, $history, $hymm)) {
        echo "<script>alert('About page updated successfully.');</script>";
    } else {
        echo "<script>alert('Failed to update about page.');</script>";
    }
    header("Location: about.php");
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
                <h1 class="page-title">Manage About Page</h1>
            </div>
            <div class="topbar-right">
                <div class="admin-profile">
                    <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                </div>
            </div>
        </div>
        <!-- Dashboard Content -->
        <div class="admin-content">
            <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 900px; margin: 0 auto;">
                <h1 style="font-size: 2rem; font-weight: 800; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Edit About Page</h1>
                
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $about['id'] ?>">
                    
                    <!-- History Section -->
                    <div style="margin-bottom: 2rem;">
                        <label for="history" style="display: block; font-weight: 700; color: var(--color-text); margin-bottom: 0.75rem; font-size: 1.1rem;">History Content</label>
                        <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 1rem;">Edit the school history section that appears on the about page</p>
                        <textarea class="form-control summernote" id="history" name="history" rows="10" style="border-radius: 8px; border: 1px solid var(--color-border);"><?php echo $about['history'] ?></textarea>
                    </div>
                    
                    <!-- Hymn Section -->
                    <div style="margin-bottom: 2rem;">
                        <label for="hymm" style="display: block; font-weight: 700; color: var(--color-text); margin-bottom: 0.75rem; font-size: 1.1rem;">School Hymn</label>
                        <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 1rem;">Edit the school hymn with verses and lyrics</p>
                        <textarea class="form-control summernote" id="hymm" name="hymm" rows="10" style="border-radius: 8px; border: 1px solid var(--color-border);"><?php echo $about['hymm'] ?></textarea>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div style="display: flex; gap: 1rem; justify-content: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                        <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px;">Save Changes</button>
                        <a href="faculties_staff.php" class="btn btn-secondary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--color-border); color: var(--color-text); display: inline-block;">Cancel</a>
                    </div>
                </form>
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
