<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$facultyStaffModule = new FacultyStaffModule();
$facultyModule = new FacultyModule();
$id = $_GET['id'];
$faculty = $facultyModule->getFaculty($id);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $facultyModule->updateFaculty($id, $name);
    echo "
    <script>
        alert('Faculty updated successfully.');
        window.location.href = 'faculties_staff.php';
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
                <!-- Edit Faculty Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 500px; margin: 0 auto;">
                        <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Edit Faculty</h2>
                        
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $faculty['id'] ?>">
                            
                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Faculty Name</label>
                                <input type="text" value="<?php echo $faculty['name'] ?>" name="name" placeholder="Enter Faculty Name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Update the faculty/department name</p>
                            </div>
                            
                            <div style="display: flex; gap: 1rem; justify-content: center;">
                                <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Update</button>
                                <a href="faculties_staff.php" class="btn btn-secondary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 8px; display: inline-block;">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>

</html>