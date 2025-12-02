<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$resourcesModule = new ResourcesModule();
$subjectModule = new SubjectModule();
$id = $_GET['id'];
$resource = $resourcesModule->getResource($id);
$subjects = $subjectModule->fetchSubject();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $link = $_POST['link'];
    $subject_id = $_POST['subject'];
    $filename = $resource['filePath']; // Keep existing document by default

    // Handle file upload only if a file was provided
    if (!empty($_FILES["document"]["name"])) {
        $targetDir = "../uploads/resources/";
        $extension = pathinfo($_FILES["document"]["name"], PATHINFO_EXTENSION);
        
        if (!in_array($extension, ['pdf', 'doc', 'docx', 'txt', 'ppt', 'pptx', 'xls', 'xlsx'])) {
            echo "
            <script>
                alert('Invalid file type. Only PDF, DOC, DOCX, TXT, PPT, PPTX, XLS, and XLSX are allowed.');
                window.location.href = 'learning_resources.php';
            </script>
            ";
            exit();
        }
        
        $unique_filename = uniqid() . "." . $extension;
        $targetFile = $targetDir . $unique_filename;
        
        if (move_uploaded_file($_FILES['document']['tmp_name'], $targetFile)) {
            $filename = $unique_filename; // Use new filename only if upload successful
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'learning_resources.php';
            </script>
            ";
            exit();
        }
    }
    
    $resourcesModule->updateResource($id, $title, $overview, $link, $filename, $subject_id);
    
    // Log activity
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'updated', 'resource', $id, $title);
    
    echo "
    <script>
        alert('Resource updated successfully.');
        window.location.href = 'learning_resources.php';
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
                <!-- Edit Resource Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 0; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); overflow: hidden;">
                        <!-- Document File Name Display -->
                        <div style="width: 100%; padding: 2rem; text-align: center; background: linear-gradient(135deg, var(--color-background), var(--color-surface)); border-bottom: 1px solid var(--color-border);">
                            <p style="font-size: 0.875rem; font-weight: 600; color: var(--color-text-secondary); margin-bottom: 0.5rem;">Current Document</p>
                            <p style="font-size: 1.1rem; font-weight: 600; color: var(--color-text); margin: 0;"><?php echo $resource['path'] ?></p>
                        </div>
                        
                        <!-- Form Section -->
                        <div style="padding: 2rem;">
                            <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 2rem;">Edit Resource</h2>
                            
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $resource['id'] ?>">
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Resource Title</label>
                                    <input type="text" value="<?php echo $resource['title'] ?>" name="title" placeholder="Enter Resource Title" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Overview</label>
                                    <textarea name="overview" placeholder="Enter Resource Overview" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 100px;"><?php echo $resource['overview'] ?></textarea>
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Resource Link</label>
                                    <input type="url" value="<?php echo $resource['link'] ?>" name="link" placeholder="Enter Resource Link (URL)" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                </div>
                                
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Subject</label>
                                    <select name="subject" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; background-color: white; color: var(--color-text);">
                                        <option value="">-- Select Subject --</option>
                                        <?php foreach ($subjects as $subj) { ?>
                                            <option value="<?php echo $subj['id'] ?>" <?php echo ($subj['id'] == $resource['subject_id']) ? 'selected' : ''; ?>><?php echo $subj['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div style="margin-bottom: 1.5rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Document File</label>
                                    <input type="file" name="document" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Accepted formats: PDF, DOC, DOCX, TXT, PPT, PPTX, XLS, XLSX</p>
                                </div>
                                
                                <div style="display: flex; gap: 1rem; justify-content: center;">
                                    <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update</button>
                                    <a href="learning_resources.php" class="btn btn-secondary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 8px; display: inline-block;">Cancel</a>
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
