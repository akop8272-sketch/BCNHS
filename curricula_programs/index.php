<?php
include('../functions/functions.php');
$curriculaModule = new ProgramsModule();
$programs = $curriculaModule->fetchPrograms();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curricula & Programs - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="curricula-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Curricula & Programs</h1>
        <div class="curricula-wrapper">
            <!-- Left Column: List of Programs -->
            <aside class="curricula-list">
                <h2 class="curricula-sidebar-title">Our Programs</h2>
                <?php foreach($programs as $index => $program) {?>
                <a href="#program-<?php echo $index; ?>" class="program-card <?php echo $index === 0 ? 'active' : ''; ?>" data-program="<?php echo $index; ?>">
                    <div class="program-card-image">
                        <img src="../uploads/programs/<?php echo $program['imgPath'] ?>" alt="<?php echo $program['title'] ?>" style="height: 100%;">
                    </div>
                    <div class="program-card-content">
                        <h3 class="program-card-title"><?php echo $program['title'] ?></h3>
                        <p class="program-card-overview"><?php echo $program['overview'] ?></p>
                    </div>
                </a>
                <?php } ?>
            </aside>

            <!-- Right Column: Program Details -->
            <section class="curricula-details">
                <?php foreach($programs as $index => $program) { ?>
                <!-- Program Detail -->
                <div id="program-<?php echo $index; ?>" class="program-detail <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="program-cover">
                        <img src="../uploads/programs/<?php echo $program['imgPath'] ?>" alt="<?php echo $program['title'] ?>">
                    </div>
                    <div class="program-info">
                        <h2 class="program-detail-title"><?php echo $program['title'] ?></h2>
                        <p class="program-detail-overview"><?php echo $program['overview'] ?></p>
                        <div class="program-detail-content">
                            <?php echo $program['content'] ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        // Navigation link click handler - only for program navigation
        document.querySelectorAll('.curricula-list .program-card').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all program cards and detail sections
                document.querySelectorAll('.curricula-list .program-card').forEach(l => l.classList.remove('active'));
                document.querySelectorAll('.program-detail').forEach(s => s.classList.remove('active'));
                
                // Add active class to clicked card and corresponding detail
                this.classList.add('active');
                const programId = this.getAttribute('href');
                const programDetail = document.querySelector(programId);
                if(programDetail) {
                    programDetail.classList.add('active');
                }
            });
        });

        // Handle hash on page load
        function handleHashLoad() {
            const hash = window.location.hash;
            if(hash) {
                const programDetail = document.querySelector(hash);
                const programCard = document.querySelector('.curricula-list a[href="' + hash + '"]');
                
                if(programDetail && programCard) {
                    // Remove active from all
                    document.querySelectorAll('.curricula-list .program-card').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.program-detail').forEach(s => s.classList.remove('active'));
                    
                    // Add active to matching elements
                    programCard.classList.add('active');
                    programDetail.classList.add('active');
                    
                    // Scroll to program detail
                    programDetail.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }

        // Call on page load
        window.addEventListener('load', handleHashLoad);
        // Also handle if hash changes
        window.addEventListener('hashchange', handleHashLoad);
    </script>
    
    <?php 
    $path = '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    include('../includes/footer.php'); ?>
</body>
</html>
