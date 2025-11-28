<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$principalModule = new PrincipalModule();
$principals = $principalModule->fetchPrincipal();
$principal = count($principals) > 0 ? $principals[0] : null;

if(!$principal) {
    echo "<script>alert('No principal entry found. Please create one first.');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Principal - BCNHS Admin</title>
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
                <h1 class="page-title">Manage Principal</h1>
            </div>
            <div class="topbar-right">
                <div class="admin-profile">
                    <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="admin-content">
            <?php if($principal): ?>
            <a href="editPrincipal.php?id=<?php echo $principal['id']; ?>" class="btn btn-primary" style="margin-bottom: 1.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; display: inline; margin-right: 0.5rem;">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Edit Principal
            </a>

            <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08);">
                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem; align-items: start;">
                    <!-- Image Section -->
                    <div>
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text); margin-bottom: 1rem;">Principal Image</h3>
                        <?php if(!empty($principal['imgPath']) && file_exists('../uploads/principal/' . $principal['imgPath'])): ?>
                            <img src="../uploads/principal/<?php echo htmlspecialchars($principal['imgPath']); ?>" alt="<?php echo htmlspecialchars($principal['name']); ?>" style="width: 100%; border-radius: 8px; object-fit: cover; aspect-ratio: 1;">
                        <?php else: ?>
                            <div style="background: linear-gradient(135deg, #e9edf7 0%, #f5f7fb 100%); border-radius: 8px; aspect-ratio: 1; display: flex; align-items: center; justify-content: center; color: rgba(0,0,0,0.45);">
                                <span>No image uploaded</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Info Section -->
                    <div>
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--color-text); margin-bottom: 1rem;">Principal Information</h3>
                        <div style="margin-bottom: 1.5rem;">
                            <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 0.5rem;">Name</p>
                            <p style="font-size: 1.2rem; font-weight: 600; color: var(--color-text);"><?php echo htmlspecialchars($principal['name']); ?></p>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <p style="color: var(--color-muted); font-size: 0.9rem; margin-bottom: 0.5rem;">Introduction</p>
                            <div style="background: var(--color-border); border-radius: 8px; padding: 1rem; color: var(--color-text); line-height: 1.6;">
                                <?php echo !empty($principal['introduction']) ? html_entity_decode(htmlspecialchars_decode($principal['introduction'])) : '<span style="color: var(--color-muted);">No introduction added</span>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php else: ?>
            <div style="background: var(--color-surface); border-radius: 12px; padding: 3rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); text-align: center;">
                <p style="color: var(--color-muted); font-size: 1.1rem;">No principal entry found. Please create one first in the database.</p>
            </div>
            <?php endif; ?>
        </div>
    </main>
    </div>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>
</html>
