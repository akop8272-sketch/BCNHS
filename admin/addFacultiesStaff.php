<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$facultyModule = new FacultyStaffModule();
$fname = new FacultyModule();
$fetch = $fname->fetchFaculty();

if (isset($_POST['submit'])) {
    $faculty = $_POST['faculty'];
    $name = $_POST['name'];
    $position = $_POST['position'];

    // Handle file upload
    $filename = $_FILES["photo"]["name"];
    $targetDir = "../uploads/faculty/";
    $targetFile = $targetDir . basename($filename);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['photo']['tmp_name'];
    if (!in_array($extension, ['mp4', 'png', 'jpg', 'jpeg'])) {
        echo "
        <script>
            alert('Invalid file type. Only MP4, PNG, JPG, and JPEG are allowed.');
            window.location.href = 'addFacultiesStaff.php';
        </script>
        ";
        exit();
    } else {
        if (move_uploaded_file($file, $targetFile)) {
            $staffId = $facultyModule->createFacultyStaff($faculty, $name, $position, $filename);
            
            // Log activity
            $activityLog = new ActivityLogModule();
            $activityLog->logActivity($currentUser['id'], 'created', 'faculty_staff', $staffId, $name);
            
            echo "
            <script>
                alert('Faculty/Staff added successfully.');
                window.location.href = 'faculties_staff.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'addFacultiesStaff.php';
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
    <title>Add Staff - BCNHS</title>
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
                    <h1 class="page-title">Add Staff Member</h1>
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
                    <h1 style="font-size: 2rem; font-weight: 800; color: var(--color-text); margin-bottom: 2rem; text-align: center;">Add New Staff Member</h1>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Department</label>
                            <select name="faculty" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box; background-color: white; color: var(--color-text);">
                                <option value="">-- Select Department --</option>
                                <?php foreach ($fetch as $fetches) { ?>
                                    <option value="<?php echo $fetches['id'] ?>"><?php echo $fetches['name'] ?></option>
                                <?php } ?>
                            </select>
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Which faculty or department does this staff member belong to?</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Staff Name</label>
                            <input type="text" name="name" placeholder="Enter the Name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">The full name of the faculty or staff member.</p>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Position</label>
                            <input type="text" name="position" placeholder="Enter the Position" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Job title or position (e.g., "Principal", "Teacher", "Coordinator").</p>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Photo</label>
                            <input type="file" name="photo" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Accepted formats: MP4, PNG, JPG, JPEG</p>
                        </div>
                        
                        <div style="display: flex; gap: 1rem; justify-content: center; border-top: 1px solid var(--color-border); padding-top: 2rem;">
                            <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 8px;">Add Staff</button>
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
</body>

</html>
