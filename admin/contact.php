<?php
include('../includes/auth.php');
requireAdmin();

include('../functions/functions.php');
$currentUser = getCurrentUser();
$contactModule = new ContactModule();
$activityLog = new ActivityLogModule();

$editContact = null;

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $editContact = $contactModule->getContact($id);
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $contact = $contactModule->getContact($id);
    if ($contact) {
        $activityLog->logActivity($currentUser['id'], 'deleted', 'contact', $id, $contact['email'] ?? 'Contact');
        $contactModule->deleteContact($id);
    }
    header('Location: contact.php');
    exit();
}

if (isset($_POST['save'])) {
    $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? null;
    $facebook_url = $_POST['facebook_url'] ?? null;
    $youtube_url = $_POST['youtube_url'] ?? null;

    if ($id) {
        $contactModule->updateContact($id, $address, $email, $phone, $facebook_url, $youtube_url);
        $activityLog->logActivity($currentUser['id'], 'updated', 'contact', $id, $email);
        echo "<script>alert('Contact updated successfully.'); window.location.href='contact.php';</script>";
        exit();
    } else {
        $newId = $contactModule->createContact($address, $email, $phone, $facebook_url, $youtube_url);
        $activityLog->logActivity($currentUser['id'], 'created', 'contact', $newId, $email);
        echo "<script>alert('Contact created successfully.'); window.location.href='contact.php';</script>";
        exit();
    }
}

$contacts = $contactModule->fetchContacts();
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
                    <h1 class="page-title">Manage Contact</h1>
                </div>
                <div class="topbar-right">
                    <div class="admin-profile">
                        <span class="profile-name"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="admin-content">
                <section class="dashboard-section">
                    <h2 class="section-title"><?php echo $editContact ? 'Edit Contact' : 'Add Contact'; ?></h2>
                    <form action="contact.php" method="POST" class="row g-3">
                        <input type="hidden" name="id" value="<?php echo $editContact['id'] ?? ''; ?>">
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3" required><?php echo htmlspecialchars($editContact['address'] ?? ''); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($editContact['email'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($editContact['phone'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook URL</label>
                            <input type="url" name="facebook_url" class="form-control" value="<?php echo htmlspecialchars($editContact['facebook_url'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube URL</label>
                            <input type="url" name="youtube_url" class="form-control" value="<?php echo htmlspecialchars($editContact['youtube_url'] ?? ''); ?>">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <?php if ($editContact): ?>
                                <a href="contact.php" class="btn btn-secondary">Cancel</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </section>

                <section class="dashboard-section">
                    <h2 class="section-title">Contacts</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Facebook</th>
                                    <th>YouTube</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $c): ?>
                                <tr>
                                    <td><?php echo (int)$c['id']; ?></td>
                                    <td><?php echo htmlspecialchars($c['address']); ?></td>
                                    <td><?php echo htmlspecialchars($c['email']); ?></td>
                                    <td><?php echo htmlspecialchars($c['phone'] ?? ''); ?></td>
                                    <td>
                                        <?php if (!empty($c['facebook_url'])): ?>
                                            <a target="_blank" href="<?php echo htmlspecialchars($c['facebook_url']); ?>">Open</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($c['youtube_url'])): ?>
                                            <a target="_blank" href="<?php echo htmlspecialchars($c['youtube_url']); ?>">Open</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="contact.php?edit=<?php echo (int)$c['id']; ?>">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" href="contact.php?delete=<?php echo (int)$c['id']; ?>" onclick="return confirm('Delete this contact?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (count($contacts) === 0): ?>
                                <tr>
                                    <td colspan="7" class="text-center">No contacts found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

