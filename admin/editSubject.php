<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$subjectModule = new SubjectModule();

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No subject selected.');
        window.location.href = 'learning_resources.php';
    </script>";
    exit();
}

$id = $_GET['id'];
$subject = $subjectModule->getSubject($id);

if (!$subject) {
    echo "
    <script>
        alert('Subject not found.');
        window.location.href = 'learning_resources.php';
    </script>";
    exit();
}

if (isset($_POST['update'])) {
    $subjectName = $_POST['subjectName'];
    $subjectModule->updateSubject($id, $subjectName);
    
    // Log activity
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'updated', 'subject', $id, $subjectName);
    
    echo "
    <script>
        alert('Subject updated successfully.');
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
    <title>Edit Subject - BCNHS</title>
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
                    <h1 class="page-title">Edit Subject</h1>
                </div>
                <div class="topbar-right">

                   
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content" style="display: flex; justify-content: center; align-items: flex-start; min-height: 60vh;">
                <!-- Edit Subject Card -->
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 600px; width: 100%;">
                    <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">Edit Subject</h2>
                    <form action="" method="post">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Subject Name</label>
                            <input type="text" name="subjectName" placeholder="Enter Subject Name" value="<?php echo htmlspecialchars($subject['name']) ?>" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                        </div>
                        <div style="display: flex; gap: 1rem;">
                            <button type="submit" name="update" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update Subject</button>
                            <a href="learning_resources.php" class="btn btn-tertiary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none;">Cancel</a>
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
