<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BCNHS</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php 
    include('includes/auth.php');
    include('functions/functions.php');
    
    // Redirect if already logged in
    redirectIfLoggedIn();
    
    $error = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (!empty($email) && !empty($password)) {
            $usersModule = new UsersModule();
            $user = $usersModule->getUserByEmail($email);
            
            if ($user && password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                
                // Redirect based on role
                if ($user['role'] === 'Admin') {
                    header('Location: /websys/BCNHS/admin/');
                } else if ($user['role'] === 'Faculty') {
                    header('Location: /websys/BCNHS/admin/faculty-dashboard.php');
                } else {
                    header('Location: /websys/BCNHS/');
                }
                exit();
            } else {
                $error = 'Invalid email or password';
            }
        } else {
            $error = 'Please enter both email and password';
        }
    }
    ?>

    <?php include('includes/header.php'); ?>

    <main class="login-main">
        <div class="login-container">
            <div class="login-card">
                <!-- Logo Holder -->
                <div class="logo-holder">
                    <?php 
                        if (file_exists('assets\Baguio_City_National_High_School_logo.png')) {
                            echo '<img src="assets\Baguio_City_National_High_School_logo.png" alt="BCNHS Logo">';
                        } else {
                            echo '<svg width="80" height="80" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="50" cy="50" r="50" fill="#f8fafc"/>
                                    <circle cx="50" cy="30" r="12" fill="#dc2626"/>
                                    <path d="M 35 50 L 35 75 L 65 75 L 65 50 L 50 40 Z" fill="#dc2626" opacity="0.8"/>
                                  </svg>';
                        }
                    ?>
                </div>

                <!-- Form Title -->
                <h2 class="login-title">Sign In</h2>
                <p class="login-subtitle">Welcome back to BCNHS</p>

                <!-- Error Message -->
                <?php if (!empty($error)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>

                <!-- Login Form -->
                <form action="login.php" method="POST" class="login-form">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="username" 
                            name="username" 
                            placeholder="Enter your email"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

                <!-- Additional Links -->
                <div class="login-footer">
                    <a href="#" class="signup-link">Create account</a>
                </div>
            </div>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
