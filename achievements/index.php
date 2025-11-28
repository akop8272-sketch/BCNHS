<?php
include('../functions/functions.php');
$achievementsModule = new AchievementsModule();
$achievements = $achievementsModule->fetchAchievements();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="achievements-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Achievements</h1>
        <div class="achievements-wrapper">
            <!-- Left Column: Achievement Cards -->
            <aside class="achievements-sidebar">
                <div class="achievements-list">
                    <?php foreach($achievements as $index => $achievement) {?>
                    <a href="#achievement-<?php echo $index; ?>" class="achievement-card-link <?php echo $index === 0 ? 'active' : ''; ?>" data-achievement="<?php echo $index; ?>">
                        <div class="achievement-card">
                            <div class="achievement-card-image">
                                <img src="../uploads/achievements/<?php echo $achievement['imgPath'] ?>" alt="<?php echo $achievement['title'] ?>" />
                            </div>
                            <div class="achievement-card-content">
                                <h3 class="achievement-card-title"><?php echo $achievement['title'] ?></h3>
                                <p class="achievement-card-overview"><?php echo substr($achievement['overview'] ?? $achievement['content'], 0, 100) . '...' ?></p>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </aside>

            <!-- Right Column: Achievement Details -->
            <section class="achievements-content">
                <?php foreach($achievements as $index => $achievement) { ?>
                <div id="achievement-<?php echo $index; ?>" class="achievement-detail <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="achievement-headline-image" style="height: max-content;">
                        <img src="../uploads/achievements/<?php echo $achievement['imgPath'] ?>" alt="<?php echo $achievement['title'] ?>" />
                    </div>
                    <h1 class="achievement-title"><?php echo $achievement['title'] ?></h1>
                    <div class="achievement-meta">
                        <span class="achievement-overview">📋 <?php echo $achievement['overview'] ?></span>
                    </div>
                    <div class="achievement-body">
                        <?php echo $achievement['content'] ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        function initAchievementNavigation() {
            // Navigation link click handler
            document.querySelectorAll('.achievements-sidebar .achievement-card-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all cards and details
                    document.querySelectorAll('.achievements-sidebar .achievement-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.achievement-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active class to clicked card and corresponding detail
                    this.classList.add('active');
                    const achievementId = this.getAttribute('href');
                    const achievementDetail = document.querySelector(achievementId);
                    if(achievementDetail) {
                        achievementDetail.classList.add('active');
                    }
                });
            });

            // Handle hash on page load
            const hash = window.location.hash;
            if(hash) {
                const achievementDetail = document.querySelector(hash);
                const achievementCard = document.querySelector('.achievements-sidebar a[href="' + hash + '"]');
                
                if(achievementDetail && achievementCard) {
                    // Remove active from all
                    document.querySelectorAll('.achievements-sidebar .achievement-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.achievement-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active to matching elements
                    achievementCard.classList.add('active');
                    achievementDetail.classList.add('active');
                }
            }
        }

        // Initialize on page load
        if(document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initAchievementNavigation);
        } else {
            initAchievementNavigation();
        }

        // Also handle if hash changes
        window.addEventListener('hashchange', function() {
            const hash = window.location.hash;
            if(hash) {
                const achievementDetail = document.querySelector(hash);
                const achievementCard = document.querySelector('.achievements-sidebar a[href="' + hash + '"]');
                
                if(achievementDetail && achievementCard) {
                    document.querySelectorAll('.achievements-sidebar .achievement-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.achievement-detail').forEach(d => d.classList.remove('active'));
                    achievementCard.classList.add('active');
                    achievementDetail.classList.add('active');
                }
            }
        });
    </script>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";    
    include('../includes/footer.php'); ?>
</body>
</html>
