<?php
include('../includes/auth.php');
// Allow both Admin and Faculty to delete, with ownership checks
requireAdminOrFaculty();

include('../functions/functions.php');
$articlesModule = new ArticlesModule();
$currentUser    = getCurrentUser();
$isAdmin        = hasRole('Admin');
$isFaculty      = hasRole('Faculty');

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('No article selected.');
        window.location.href = 'articles.php';
    </script>";
    exit();
}

$id      = $_GET['id'];
$article = $articlesModule->getArticle($id);

if (!$article) {
    echo "
    <script>
        alert('Article not found.');
        window.location.href = 'articles.php';
    </script>";
    exit();
}

// If faculty (not admin), ensure they can only delete their own article
if ($isFaculty && !$isAdmin) {
    if (!isset($article['created_by']) || $article['created_by'] != $currentUser['id']) {
        echo "
        <script>
            alert('You are not allowed to delete this article.');
            window.location.href = 'articles.php';
        </script>";
        exit();
    }
}

// Log activity before deletion
$activityLog = new ActivityLogModule();
$activityLog->logActivity($currentUser['id'], 'deleted', 'article', $id, $article['title']);

$articlesModule->deleteArticle($id);

echo "
<script>
    alert('Article deleted successfully.');
    window.location.href = 'articles.php';
</script>";
exit();
