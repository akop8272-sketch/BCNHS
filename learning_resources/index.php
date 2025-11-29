<?php 
include('../includes/auth.php');
requireLogin();

include('../functions/functions.php');
$subjectsModule = new SubjectModule();
$subjects = $subjectsModule->fetchSubject();
$resourcesModule = new ResourcesModule();
$resources = $resourcesModule->fetchResources();

// Group resources by subject
$resourcesBySubject = [];
foreach($resources as $resource) {
    $subjectId = $resource['subject_id'];
    if(!isset($resourcesBySubject[$subjectId])) {
        $resourcesBySubject[$subjectId] = [];
    }
    $resourcesBySubject[$subjectId][] = $resource;
}

// Function to extract YouTube video ID
function getYouTubeVideoId($url) {
    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $matches);
    return $matches[1] ?? null;
}

// Function to get YouTube thumbnail
function getYouTubeThumbnail($url) {
    $videoId = getYouTubeVideoId($url);
    return $videoId ? "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg" : null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Resources - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="learning-resources-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Learning Resources</h1>
        <div class="learning-resources-wrapper">
            <!-- Left Column: Category Navigation -->
            <aside class="resources-sidebar">
                <h2 class="resources-sidebar-title">Subjects</h2>
                <nav class="resources-nav">
                    <ul class="resources-category-list">
                        <?php foreach($subjects as $index => $subject) { ?>
                        <li><a href="#subject-<?php echo $index; ?>" class="resource-category-link <?php echo $index === 0 ? 'active' : ''; ?>" data-subject="<?php echo $index; ?>"><?php echo $subject['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </aside>

            <!-- Right Column: Resource Content -->
            <section class="resources-content">
                <?php foreach($subjects as $index => $subject) { ?>
                <!-- Subject section -->
                <div id="subject-<?php echo $index; ?>" class="resource-section <?php echo $index === 0 ? 'active' : ''; ?>">
                    <h2 class="section-title"><?php echo $subject['name'] ?></h2>
                    <p class="section-description"><?php echo $subject['description'] ?? 'Resources for ' . $subject['name'] ?></p>
                    <div class="resources-grid">
                        <?php 
                        $subjectResources = $resourcesBySubject[$subject['id']] ?? [];
                        foreach($subjectResources as $resource) { 
                            $thumbnail = getYouTubeThumbnail($resource['link']);
                        ?>
                        <div class="resource-card">
                            <?php if($thumbnail) { ?>
                            <a href="<?php echo $resource['link'] ?>" target="_blank" class="resource-video resource-video-link">
                                <img src="<?php echo $thumbnail ?>" alt="<?php echo $resource['title'] ?>" />
                                <div class="video-play-button"></div>
                            </a>
                            <?php } ?>
                            <div class="resource-content">
                                <h3 class="resource-title"><?php echo $resource['title'] ?></h3>
                                <p class="resource-description"><?php echo $resource['overview'] ?></p>
                                <?php if(!empty($resource['path'])) { ?>
                                <a href="../uploads/resources/<?php echo $resource['path'] ?>" download class="resource-download-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                    Download
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        // Test: Log all elements on page load
        window.addEventListener('DOMContentLoaded', function() {
            console.log('=== Page Loaded ===');
            const links = document.querySelectorAll('.resources-nav .resource-category-link');
            const sections = document.querySelectorAll('.resource-section');
            console.log('Found links:', links.length);
            console.log('Found sections:', sections.length);
            
            links.forEach((link, i) => {
                console.log(`Link ${i}: href="${link.getAttribute('href')}", class="${link.className}"`);
            });
            
            sections.forEach((section, i) => {
                console.log(`Section ${i}: id="${section.id}", class="${section.className}"`);
            });
        });
        
        // Navigation link click handler - only for resource category navigation
        document.querySelectorAll('.resources-nav .resource-category-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('=== Link Clicked ===');
                console.log('Clicked href:', this.getAttribute('href'));
                
                // Remove active class from all category links and resource sections
                document.querySelectorAll('.resources-nav .resource-category-link').forEach(l => l.classList.remove('active'));
                document.querySelectorAll('.resource-section').forEach(s => s.classList.remove('active'));
                
                // Add active class to clicked link and corresponding section
                this.classList.add('active');
                const sectionId = this.getAttribute('href');
                const resourceSection = document.querySelector(sectionId);
                console.log('Found section:', resourceSection ? 'YES' : 'NO');
                if(resourceSection) {
                    resourceSection.classList.add('active');
                    console.log('Section is now active');
                }
            });
        });

        // Handle hash on page load
        function handleHashLoad() {
            const hash = window.location.hash;
            if(hash) {
                const resourceSection = document.querySelector(hash);
                const categoryLink = document.querySelector('.resources-nav a[href="' + hash + '"]');
                
                if(resourceSection && categoryLink) {
                    // Remove active from all
                    document.querySelectorAll('.resources-nav .resource-category-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.resource-section').forEach(s => s.classList.remove('active'));
                    
                    // Add active to matching elements
                    categoryLink.classList.add('active');
                    resourceSection.classList.add('active');
                    
                    // Scroll to resource section
                    resourceSection.scrollIntoView({ behavior: 'smooth' });
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
