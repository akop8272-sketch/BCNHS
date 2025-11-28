<?php
include('../functions/functions.php');
$articlesModule = new ArticlesModule();
$articles = $articlesModule->fetchArticles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="articles-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Articles</h1>
        <div class="articles-wrapper">
            <!-- Left Column: Article Cards -->
            <aside class="articles-sidebar">
                <div class="articles-list">
                    <?php foreach($articles as $index => $article) {?>
                    <a href="#article-<?php echo $index; ?>" class="article-card-link <?php echo $index === 0 ? 'active' : ''; ?>" data-article="<?php echo $index; ?>">
                        <div class="article-card">
                            <div class="article-card-image">
                                <img src="../uploads/articles/<?php echo $article['imgPath'] ?>" alt="<?php echo $article['title'] ?>" />
                            </div>
                            <div class="article-card-content">
                                <h3 class="article-card-title"><?php echo $article['title'] ?></h3>
                                <p class="article-card-overview"><?php echo substr($article['overview'] ?? $article['content'], 0, 100) . '...' ?></p>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </aside>

            <!-- Right Column: Article Details -->
            <section class="articles-content">
                <?php foreach($articles as $index => $article) { ?>
                <div id="article-<?php echo $index; ?>" class="article-detail <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="article-headline-image" style="height: max-content;">
                        <img src="../uploads/articles/<?php echo $article['imgPath'] ?>" alt="<?php echo $article['title'] ?>" />
                    </div>
                    <h1 class="article-title"><?php echo $article['title'] ?></h1>
                    <div class="article-meta">
                        <span class="article-date">📅 <?php echo $article['date'] ?></span>
                        <span class="article-author">✍️ By <?php echo $article['author'] ?></span>
                    </div>
                    <div class="article-body">
                        <?php echo $article['content'] ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        function initArticleNavigation() {
            // Navigation link click handler
            document.querySelectorAll('.articles-sidebar .article-card-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all cards and details
                    document.querySelectorAll('.articles-sidebar .article-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.article-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active class to clicked card and corresponding detail
                    this.classList.add('active');
                    const articleId = this.getAttribute('href');
                    const articleDetail = document.querySelector(articleId);
                    if(articleDetail) {
                        articleDetail.classList.add('active');
                    }
                });
            });

            // Handle hash on page load
            const hash = window.location.hash;
            if(hash) {
                const articleDetail = document.querySelector(hash);
                const articleCard = document.querySelector('.articles-sidebar a[href="' + hash + '"]');
                
                if(articleDetail && articleCard) {
                    // Remove active from all
                    document.querySelectorAll('.articles-sidebar .article-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.article-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active to matching elements
                    articleCard.classList.add('active');
                    articleDetail.classList.add('active');
                }
            }
        }

        // Initialize on page load
        if(document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initArticleNavigation);
        } else {
            initArticleNavigation();
        }

        // Also handle if hash changes
        window.addEventListener('hashchange', function() {
            const hash = window.location.hash;
            if(hash) {
                const articleDetail = document.querySelector(hash);
                const articleCard = document.querySelector('.articles-sidebar a[href="' + hash + '"]');
                
                if(articleDetail && articleCard) {
                    document.querySelectorAll('.articles-sidebar .article-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.article-detail').forEach(d => d.classList.remove('active'));
                    articleCard.classList.add('active');
                    articleDetail.classList.add('active');
                }
            }
        });
    </script>
    
    <?php 
    $path = '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    include('../includes/footer.php'); ?>
</body>
</html>
