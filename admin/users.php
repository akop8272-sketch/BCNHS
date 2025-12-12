<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$usersModule = new UsersModule();
$users = $usersModule->fetchUsers();
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
                    <h1 class="page-title">Users Management</h1>
                </div>
                <div class="topbar-right">
                    <a href="addUser.php" class="btn btn-primary">+ Add New User</a>
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <div class="dashboard-section">
                    <div style="background: var(--color-surface); border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); overflow: hidden;">
                        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">All Users</h2>
                        
                        <?php if(count($users) > 0) { ?>
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: var(--color-background); border-bottom: 2px solid var(--color-border);">
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--color-text);">ID</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--color-text);">Name</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--color-text);">Email</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--color-text);">Role</th>
                                        <th style="padding: 1rem; text-align: center; font-weight: 600; color: var(--color-text);">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { if($user['role'] != "Admin"){ ?>
                                    <tr style="border-bottom: 1px solid var(--color-border); transition: background 0.2s ease;">
                                        <td style="padding: 1rem; color: var(--color-text);"><?php echo $user['id'] ?></td>
                                        <td style="padding: 1rem; color: var(--color-text);"><?php echo $user['name'] ?></td>
                                        <td style="padding: 1rem; color: var(--color-text);"><?php echo $user['email'] ?></td>
                                        <td style="padding: 1rem; color: var(--color-text);">
                                            <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; font-weight: 600; 
                                            background: <?php echo $user['role'] === 'Admin' ? '#fecaca' : ($user['role'] === 'Faculty' ? '#bfdbfe' : '#d1fae5'); ?>;
                                            color: <?php echo $user['role'] === 'Admin' ? '#991b1b' : ($user['role'] === 'Faculty' ? '#1e40af' : '#065f46'); ?>;">
                                                <?php echo $user['role'] ?>
                                            </span>
                                        </td>
                                        <td style="padding: 1rem; text-align: center;">
                                            <a href="editUser.php?id=<?php echo $user['id'] ?>" class="btn btn-sm" style="background: var(--color-primary); color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem; display: inline-block; margin-right: 0.5rem;">Edit</a>
                                            <a href="deleteUser.php?id=<?php echo $user['id'] ?>" class="btn btn-sm" style="background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem; display: inline-block;" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                        <p style="color: var(--color-text-secondary); text-align: center; padding: 2rem;">No users found. <a href="addUser.php" style="color: var(--color-primary); text-decoration: none;">Create one</a></p>
                        <?php } ?>
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
