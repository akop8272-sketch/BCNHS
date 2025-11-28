<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$resourcesModule = new ResourcesModule();
$subjectModule = new SubjectModule();
$resources = $resourcesModule->fetchResources();
$subjects = $subjectModule->fetchSubject();

if (isset($_POST['addSubject'])) {
    $subjectName = $_POST['subjectName'];
    $subjectModule->createSubject($subjectName);
    echo "
    <script>
        alert('Subject added successfully.');
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
                    <h1 class="page-title">Manage Learning Resources</h1>
                </div>
                <div class="topbar-right">
                    <a href="addResource.php" class="btn btn-primary">+ Add New Resource</a>
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>
            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Subject Management: 2 Column Layout -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Left Column: Add Subject Form -->
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); height: fit-content;">
                        <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">Add Subject</h2>
                        <form action="" method="post">
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Subject Name</label>
                                <input type="text" name="subjectName" placeholder="Enter Subject Name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Enter the name of a new subject</p>
                            </div>
                            <button type="submit" name="addSubject" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Add Subject</button>
                        </form>
                    </div>

                    <!-- Right Column: List of Subjects -->
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); display: flex; flex-direction: column;">
                        <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">List of Subjects</h2>
                        <div style="flex: 1; overflow-y: auto; min-height: 0; max-height: 300px;">
                            <div style="display: flex; flex-direction: column; gap: 1rem;">
                                <?php foreach ($subjects as $subj) { ?>
                                    <div style="background: var(--color-background); border: 1px solid var(--color-border); border-radius: 8px; padding: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <h3 style="font-size: 1.1rem; font-weight: 600; color: var(--color-text); margin: 0; margin-bottom: 0.5rem;"><?php echo $subj['name'] ?></h3>
                                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin: 0;">Subject</p>
                                        </div>
                                        <div style="display: flex; gap: 0.5rem; flex-shrink: 0;">
                                            <a href="editSubject.php?id=<?php echo $subj['id'] ?>" class="btn btn-tertiary" style="padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem;">Edit</a>
                                            <a href="deleteSubject.php?id=<?php echo $subj['id'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this subject?');" style="padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem;">Delete</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); margin-bottom: 2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin: 0;">Add Learning Resource</h2>
                        <a href="addResource.php" class="btn btn-primary">+ Add New Resource</a>
                    </div>

                <!-- List of Resources Card -->
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08);">
                    <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">List of Learning Resources</h2>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: white;">
                            <tr>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Title</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Subject</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Document</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; border: none;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resources as $resource) { ?>
                                <tr style="border-bottom: 1px solid var(--color-border); transition: background 0.3s ease;">
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $resource['title'] ?></td>
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $resource['subject_name'] ?></td>
                                    <td style="padding: 1rem; color: var(--color-text);"><?php echo $resource['path'] ?></td>
                                    <td style="padding: 1rem;">
                                        <a href="editResource.php?id=<?php echo $resource['id'] ?>" class="btn btn-tertiary" style="padding: 0.5rem 1rem; margin-right: 0.5rem; border-radius: 6px; text-decoration: none;">Edit</a>
                                        <a href="deleteResource.php?id=<?php echo $resource['id'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this resource?');" style="padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none;">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>

</html>
