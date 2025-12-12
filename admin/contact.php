<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$contactModule = new ContactModule();
$contacts = $contactModule->fetchContact();
$contact = count($contacts) > 0 ? $contacts[0] : null;

if(isset($_POST['submit'])) {
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $facebook_url = $_POST['facebook_url'] ?? '';
    $youtube_url = $_POST['youtube_url'] ?? '';
    $phone = $_POST['phone'] ?? null;

    if($contact) {
        $contactModule->updateContact($contact['id'], $address, $email, $facebook_url, $youtube_url, $phone);
        $content_id = $contact['id'];
    } else {
        $content_id = $contactModule->createContact($address, $email, $facebook_url, $youtube_url, $phone);
    }

    $activityLog = new ActivityLogModule();
    $activityLog->logActivity($currentUser['id'], 'updated', 'contact', $content_id, 'Contact Information');

    echo "<script>alert('Contact information saved successfully.'); window.location.href = 'contact.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contact - BCNHS Admin</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php') ?>
    <div class="admin-body">
        <?php include('../includes/admin_sidebar.php') ?>

        <main class="admin-main">
            <div class="admin-topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Manage Contact Information</h1>
                </div>
                <div class="topbar-right">
                    
                </div>
            </div>

            <div class="admin-content" style="display: flex; justify-content: center; align-items: flex-start; min-height: 60vh;">
                <div style="background: var(--color-surface); border-radius: 12px; padding: 2rem; box-shadow: 0 4px 12px rgba(12, 22, 43, 0.08); max-width: 800px; width: 100%;">
                    <h2 style="font-size: 1.8rem; font-weight: 700; color: var(--color-text); margin-bottom: 1.5rem;">Edit Contact Details</h2>
                    <form action="" method="post">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Address</label>
                            <input type="text" name="address" value="<?php echo htmlspecialchars($contact['address'] ?? ''); ?>" placeholder="Enter address" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Email</label>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($contact['email'] ?? ''); ?>" placeholder="Enter email" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Facebook URL</label>
                            <input type="url" name="facebook_url" value="<?php echo htmlspecialchars($contact['facebook_url'] ?? ''); ?>" placeholder="https://facebook.com/..." style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">YouTube URL</label>
                            <input type="url" name="youtube_url" value="<?php echo htmlspecialchars($contact['youtube_url'] ?? ''); ?>" placeholder="https://youtube.com/..." style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-weight: 600; color: var(--color-text); margin-bottom: 0.5rem;">Phone (optional)</label>
                            <input type="text" name="phone" value="<?php echo htmlspecialchars($contact['phone'] ?? ''); ?>" placeholder="Enter phone number" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: 8px; font-size: 1rem;">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem;">Save Changes</button>
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

