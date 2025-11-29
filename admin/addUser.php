<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$usersModule = new UsersModule();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Check if email already exists
    $existingUser = $usersModule->getUserByEmail($email);
    if($existingUser) {
        echo "
        <script>
            alert('Email already exists. Please use a different email.');
            window.history.back();
        </script>
        ";
        exit();
    }

    $usersModule->createUser($name, $email, $password, $role);
    
    // Log activity
    $currentUser = getCurrentUser();
    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'created', 'user', null, $name);
    
    echo "
    <script>
        alert('User created successfully.');
        window.location.href = 'users.php';
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
                    <h1 class="page-title">Add User</h1>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <!-- Add User Card -->
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 0; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); overflow: hidden;">
                        <!-- Form Section -->
                        <div style="padding: 2rem;">
                            <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 2rem;">Add New User</h2>
                            
                            <form action="" method="post">
                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Full Name</label>
                                    <input type="text" name="name" placeholder="Enter full name" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">The full name of the person creating this user account.</p>
                                </div>

                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Email</label>
                                    <input type="email" name="email" placeholder="Enter email address" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">A unique email address for this user. Each user must have a different email.</p>
                                </div>

                                <div style="margin-bottom: 1rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Password</label>
                                    <input type="password" name="password" placeholder="Enter password" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Create a secure password. Use a mix of letters, numbers, and symbols if possible.</p>
                                </div>

                                <div style="margin-bottom: 1.5rem;">
                                    <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Role</label>
                                    <select name="role" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                                        <option value="">-- Select Role --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="User">User</option>
                                    </select>
                                    <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin-top: 0.25rem;">Admin: Full system access. Faculty: Can manage content in their area. User: Limited access.</p>
                                </div>
                                
                                <div style="display: flex; gap: 1rem; justify-content: center;">
                                    <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 600;">Create User</button>
                                    <a href="users.php" class="btn btn-secondary" style="padding: 0.75rem 2rem; font-weight: 600; text-decoration: none; background: var(--color-border); color: var(--color-text); border-radius: 8px; display: inline-block;">Cancel</a>
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
</body>

</html>
