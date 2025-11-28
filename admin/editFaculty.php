<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$facultyStaffModule = new FacultyStaffModule();
$facultyModule = new FacultyModule();
$id = $_GET['id'];
$staff = $facultyStaffModule->getFacultyStaff($id);
$faculties = $facultyModule->fetchFaculty();

if (isset($_POST['submit'])) {
    $id = $_POST['iid'];
    $faculty_id = $_POST['faculty'];
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
            window.location.href = 'faculties_staff.php';
        </script>
        ";
        exit();
    } else {
        if (move_uploaded_file($file, $targetFile)) {
            $facultyStaffModule->updateFacultyStaff($id, $faculty_id, $name, $position, $filename);
            echo "
            <script>
                alert('Faculty/Staff updated successfully.');
                window.location.href = 'faculties_staff.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error uploading file.');
                window.location.href = 'faculties_staff.php';
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
                <!-- Edit Staff Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 600px; margin: 0 auto;">
                        <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem; text-align: center;">Edit Staff</h2>
                        
                        <div style="text-align: center; margin-bottom: 2rem;">
                            <img src="../uploads/faculty/<?php echo $staff['imgPath'] ?>" alt="Staff Photo" style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 3px solid var(--color-primary);">
                        </div>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="iid" value="<?php echo $staff['id'] ?>">
                            
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Faculty Name</label>
                                <select name="faculty" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; background-color: white; color: var(--color-text);">
                                    <option value="">-- Select Faculty --</option>
                                    <?php foreach ($faculties as $fac) { ?>
                                        <option value="<?php echo $fac['id'] ?>" <?php echo ($fac['id'] == $staff['faculty_id']) ? 'selected' : ''; ?>><?php echo $fac['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Staff Name</label>
                                <input type="text" value="<?php echo $staff['name'] ?>" name="name" placeholder="Enter the Name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 1rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Position</label>
                                <input type="text" value="<?php echo $staff['position'] ?>" name="position" placeholder="Enter the Position" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                            </div>
                            
                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Photo</label>
                                <input type="file" name="photo" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
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