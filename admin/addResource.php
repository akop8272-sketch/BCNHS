<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$resourcesModule = new ResourcesModule();
$subjectModule = new SubjectModule();
$subjects = $subjectModule->fetchSubject();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $overview = $_POST['overview'];
    $link = $_POST['link'];
    $subject_id = $_POST['subject'];

    // Handle file upload
    $filename = $_FILES["document"]["name"];
    $targetDir = "../uploads/resources/";
    $targetFile = $targetDir . basename($filename);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['document']['tmp_name'];
    if (!in_array($extension, ['pdf', 'doc', 'docx', 'txt', 'ppt', 'pptx', 'xls', 'xlsx'])) {
        echo "
        <script>
            alert('Invalid file type. Only PDF, DOC, DOCX, TXT, PPT, PPTX, XLS, and XLSX are allowed.');
            window.location.href = 'addResource.php';
        </script>
        ";
        exit();
    } else {
        if (move_uploaded_file($file, $targetFile)) {
            $resourcesModule->createResource($title, $overview, $link, $filename, $subject_id);
            echo "
            <script>
                alert('Resource added successfully.');
                window.location.href = 'learning_resources.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'addResource.php';
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
    <title>Add Resource - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

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
                    <h1 class="page-title">Add Resource</h1>
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
                    <h1 style="font-size: 2rem; font-weight: 800; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Create New Learning Resource</h1>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Resource Title</label>
                            <input type="text" name="title" placeholder="Enter Resource Title" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Overview</label>
                            <textarea name="overview" placeholder="Enter Resource Overview" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; min-height: 100px;"></textarea>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Resource Link</label>
                            <input type="url" name="link" placeholder="Enter Resource Link (URL)" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Subject</label>
                            <select name="subject" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; background-color: white; color: var(--color-text);">
                                <option value="">-- Select Subject --</option>
                                <?php foreach ($subjects as $subj) { ?>
                                    <option value="<?php echo $subj['id'] ?>"><?php echo $subj['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Document File</label>
                            <input type="file" name="document" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Accepted formats: PDF, DOC, DOCX, TXT, PPT, PPTX, XLS, XLSX</p>
                        </div>
                        
                        <div style="display: flex; gap: 1rem; justify-content: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                            <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px;">Add Resource</button>
                            <a href="learning_resources.php" class="btn btn-secondary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--color-border); color: var(--color-text); display: inline-block;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>

</html>
