<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$principalModule = new PrincipalModule();
$principals = $principalModule->fetchPrincipal();
$principal = count($principals) > 0 ? $principals[0] : null;

if(!$principal) {
    echo "<script>alert('No principal entry found.');</script>";
    header("Location: principal.php");
    exit;
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $introduction = $_POST['introduction'];
    $imgPath = $_POST['imgPath'] ?? $principal['imgPath'];

    // Handle image upload
    if(!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/principal/";
        if(!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        
        $file_name = basename($_FILES['image']['name']);
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $unique_filename = uniqid() . "." . $file_extension;
        $target_file = $target_dir . $unique_filename;
        
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $imgPath = $unique_filename;
        }
    }

    $principalModule->updatePrincipal($id, $name, $introduction, $imgPath);
    echo "<script>alert('Principal information updated successfully.');</script>";
    header("Location: principal.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Principal - BCNHS Admin</title>
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
                <h1 class="page-title">Edit Principal</h1>
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
                <h1 style="font-size: 2rem; font-weight: 800; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Edit Principal Information</h1>
                
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $principal['id'] ?>">
                    
                    <!-- Name Section -->
                    <div style="margin-bottom: 2rem;">
                        <label for="name" style="display: block; font-weight: 700; color: var(--color-text); margin-bottom: 0.75rem; font-size: 1.1rem;">Principal Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($principal['name']); ?>" required style="border-radius: 8px; border: 1px solid var(--color-border); padding: 0.75rem 1rem;">
                    </div>
                    
                    <!-- Introduction Section -->
                    <div style="margin-bottom: 2rem;">
                        <label for="introduction" style="display: block; font-weight: 700; color: var(--color-text); margin-bottom: 0.75rem; font-size: 1.1rem;">Introduction</label>
                        <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 1rem;">Add a biography or introduction about the principal</p>
                        <textarea class="form-control summernote" id="introduction" name="introduction" rows="10" style="border-radius: 8px; border: 1px solid var(--color-border);"><?php echo htmlspecialchars($principal['introduction']); ?></textarea>
                    </div>

                    <!-- Image Section -->
                    <div style="margin-bottom: 2rem;">
                        <label for="image" style="display: block; font-weight: 700; color: var(--color-text); margin-bottom: 0.75rem; font-size: 1.1rem;">Principal Image</label>
                        <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 1rem;">Upload a new image to replace the current one</p>
                        
                        <?php if(!empty($principal['imgPath']) && file_exists('../uploads/principal/' . $principal['imgPath'])): ?>
                            <div style="margin-bottom: 1.5rem; padding: 1rem; background: var(--color-border); border-radius: 8px;">
                                <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 0.75rem;">Current Image:</p>
                                <img src="../uploads/principal/<?php echo htmlspecialchars($principal['imgPath']); ?>" alt="Principal" style="max-width: 200px; border-radius: 8px;">
                            </div>
                        <?php endif; ?>
                        
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" style="border-radius: 8px; border: 1px solid var(--color-border); padding: 0.75rem 1rem;">
                        <small style="color: var(--color-muted); display: block; margin-top: 0.5rem;">Accepted formats: JPG, PNG, GIF (Max 5MB)</small>
                    </div>

                    <input type="hidden" name="imgPath" value="<?php echo htmlspecialchars($principal['imgPath']); ?>">
                    
                    <!-- Action Buttons -->
                    <div style="display: flex; gap: 1rem; justify-content: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                        <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px;">Save Changes</button>
                        <a href="principal.php" class="btn btn-secondary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--color-border); color: var(--color-text); display: inline-block;">Cancel</a>
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
