<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Prevent function redeclaration
if (!function_exists('isLoggedIn')) {

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']);
}

// Get current user
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            'role' => $_SESSION['user_role']
        ];
    }
    return null;
}

// Check if user has specific role
function hasRole($role) {
    return isLoggedIn() && $_SESSION['user_role'] === $role;
}

// Check if user is admin or faculty
function isAdminOrFaculty() {
    return isLoggedIn() && ($_SESSION['user_role'] === 'Admin' || $_SESSION['user_role'] === 'Faculty');
}

// Redirect to login if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /websys/BCNHS/login.php');
        exit();
    }
}

// Redirect to login if not admin
function requireAdmin() {
    if (!hasRole('Admin')) {
        header('Location: /websys/BCNHS/login.php');
        exit();
    }
}

// Redirect to login if not faculty
function requireFaculty() {
    if (!hasRole('Faculty')) {
        header('Location: /websys/BCNHS/login.php');
        exit();
    }
}

// Redirect to login if not admin or faculty
function requireAdminOrFaculty() {
    if (!isAdminOrFaculty()) {
        header('Location: /websys/BCNHS/login.php');
        exit();
    }
}

// Redirect if user is logged in (for login page)
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        if (hasRole('Admin')) {
            header('Location: /websys/BCNHS/admin/');
            exit();
        } else if (hasRole('Faculty')) {
            header('Location: /websys/BCNHS/admin/faculty-dashboard.php');
            exit();
        } else {
            header('Location: /websys/BCNHS/');
            exit();
        }
    }
}

// Logout function
function logout() {
    session_destroy();
    header('Location: /websys/BCNHS/');
    exit();
}

} // End if (!function_exists)
?>
