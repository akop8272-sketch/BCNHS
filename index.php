<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Card animation styles */
        .animate-card {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        
        .animate-card.in-view {
            opacity: 1;
            transform: scale(1);
        }
        
        .animate-card.out-view {
            opacity: 0;
            transform: scale(0.8);
        }
        
        /* Hero content animation */
        .hero-content {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        
        .hero-content.in-view {
            opacity: 1;
            transform: scale(1);
        }
        
        .hero-content.out-view {
            opacity: 0;
            transform: scale(0.9);
        }
    </style>
</head>

<body>
    <?php
    include('includes/header.php');
    include('functions/functions.php');
    $aboutModule = new AboutModule();
    $about = $aboutModule->getAbout(1);
    $programsModule = new ProgramsModule();
    $programs = $programsModule->fetchPrograms();
    $principalModule = new PrincipalModule();
    $principals = $principalModule->fetchPrincipal();
    $principal = count($principals) > 0 ? $principals[0] : null;
    $contactModule = new ContactModule();
    $contacts = $contactModule->fetchContact();
    $contact = count($contacts) > 0 ? $contacts[0] : null;
    ?>
    <div class="hero" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="parent">
            <div class="div1 hero-content animate-card" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; height: 100vh;">
                <h1 style="font-size: 15vw;">Welcome</h1>
                <p class="lead">This is Baguio City National High School Website</p>
            </div>
        </div>
    </div>
    <div class="about">
        <h2 class="section-header">About The School</h2>
        <div class="about-grid" style="margin-top: 20px;">
            <div class="about-col">
                <div class="about-card animate-card">
                    <h2>History</h2>
                    <div class="about-content" style="height: 300px; overflow-y: hidden;">
                        <?php
                        echo $about['history'];
                        ?>
                    </div>
                    <a href="about/" class="btn btn-primary">View More</a>
                </div>
            </div>
            <div class="about-col">
                <div class="about-card animate-card">
                    <h2>Hymn</h2>
                    <div class="about-content" style="height: 300px; overflow-y: hidden;">
                        <?php
                        echo $about['hymm'];
                        ?>
                    </div>
                    <a href="about/" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Highlights / Cards section: Latest News, Achievement, Article -->
    <section class="cards-section">
        <div class="container">
            <h2 class="section-header">Highlights</h2>
            <div class="cards-grid">
                <?php
                // Fetch latest article
                $articlesModule = new ArticlesModule();
                $latestArticle = array_slice($articlesModule->fetchArticles(), 0, 1)[0] ?? null;

                // Fetch latest event
                $eventsModule = new EventsModule();
                $latestEvent = array_slice($eventsModule->fetchEvents(), 0, 1)[0] ?? null;

                // Fetch latest achievement
                $achievementsModule = new AchievementsModule();
                $latestAchievement = array_slice($achievementsModule->fetchAchievements(), 0, 1)[0] ?? null;
                ?>
                <!-- Latest Event Card -->
                <div class="card animate-card">
                    <div class="img-holder">
                        <?php if ($latestEvent && !empty($latestEvent['imgPath'])): ?>
                            <img src="uploads/events/<?php echo htmlspecialchars($latestEvent['imgPath']); ?>"
                                alt="<?php echo htmlspecialchars($latestEvent['title']); ?>"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <rect x="3" y="4" width="18" height="14" rx="2" ry="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Latest Event</h5>
                        <?php if ($latestEvent): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($latestEvent['overview'], 0, 100)); ?>...</p>
                            <a href="events/#event-0" class="btn btn-primary">Show More</a>
                        <?php else: ?>
                            <p class="card-text">No events available at this time. Check back soon!</p>
                            <a href="events/" class="btn btn-primary">View All Events</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Latest Achievement Card -->
                <div class="card animate-card">
                    <div class="img-holder">
                        <?php if ($latestAchievement && !empty($latestAchievement['imgPath'])): ?>
                            <img src="uploads/achievements/<?php echo htmlspecialchars($latestAchievement['imgPath']); ?>"
                                alt="<?php echo htmlspecialchars($latestAchievement['title']); ?>"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Latest Achievement</h5>
                        <?php if ($latestAchievement): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($latestAchievement['overview'], 0, 100)); ?>...</p>
                            <a href="achievements/#achievement-0" class="btn btn-primary">Show More</a>
                        <?php else: ?>
                            <p class="card-text">No achievements available at this time. Check back soon!</p>
                            <a href="achievements/" class="btn btn-primary">View All Achievements</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Latest Article Card -->
                <div class="card animate-card">
                    <div class="img-holder">
                        <?php if ($latestArticle && !empty($latestArticle['imgPath'])): ?>
                            <img src="uploads/articles/<?php echo htmlspecialchars($latestArticle['imgPath']); ?>"
                                alt="<?php echo htmlspecialchars($latestArticle['title']); ?>"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Latest Article</h5>
                        <?php if ($latestArticle): ?>
                            <p class="card-text">
                                <?php echo htmlspecialchars(substr($latestArticle['overview'], 0, 100)); ?>...</p>
                            <a href="articles/#article-0" class="btn btn-primary">Show More</a>
                        <?php else: ?>
                            <p class="card-text">No articles available at this time. Check back soon!</p>
                            <a href="articles/" class="btn btn-primary">View All Articles</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Curricula & Programs section -->
    <section class="curricula-section">
        <div class="container">
            <div class="section-header">
                <h2>Curricula & Programs</h2>
                <a class="section-link" href="curricula_programs/">View All Curricula and Programs</a>
            </div>
            <div class="curricula-grid">
                <?php foreach (array_slice($programs, 0, 3) as $index => $program) { ?>
                    <div class="card curricula-card animate-card">
                        <div class="img-holder">
                            <img src="uploads/programs/<?php echo $program['imgPath'] ?>"
                                alt="<?php echo $program['title'] ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $program['title'] ?></h5>
                            <p class="card-text"><?php echo $program['overview'] ?></p>
                            <a href="curricula_programs/#program-<?php echo $index; ?>" class="btn btn-outline-primary">View
                                More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>
    <!-- Principal section -->
    <section class="principal-section">
        <div class="container">
            <h2 class="section-header">Meet Our Principal</h2>
            <?php if ($principal): ?>
            <div class="principal-card animate-card">
                <div class="principal-image">
                    <?php if (!empty($principal['imgPath']) && file_exists('uploads/principal/' . $principal['imgPath'])): ?>
                        <img src="uploads/principal/<?php echo htmlspecialchars($principal['imgPath']); ?>" 
                             alt="<?php echo htmlspecialchars($principal['name']); ?>" 
                             style="width: 100%; height: 100%; object-fit: contain;">
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    <?php endif; ?>
                </div>
                <div class="principal-info">
                    <h3><?php echo htmlspecialchars($principal['name']); ?></h3>
                    <p class="principal-title">Principal</p>
                    <div class="principal-bio">
                        <?php echo !empty($principal['introduction']) ? html_entity_decode(htmlspecialchars_decode($principal['introduction'])) : '<span style="color: var(--color-muted);">No introduction available</span>'; ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div style="background: var(--color-surface); border-radius: 12px; padding: 3rem; text-align: center;">
                <p style="color: var(--color-muted); font-size: 1.1rem;">Principal information not available at this time.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Contact section -->
    <section class="contact-section">
        <div class="contact-wrapper">
            <div class="contact-left">
                <h2>Contact Us</h2>
                <p>Have a question, feedback, or need more information? Reach out to us and we'll respond as soon as
                    possible.</p>
                <div class="contact-info">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M3 5h18v14H3z"></path>
                        </svg>
                        <span><?php echo htmlspecialchars($contact['address'] ?? 'Governor Pack Road, Baguio City, Philippines, 2600'); ?></span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 4h16v12H4z"></path>
                            <path d="M22 6l-10 7L2 6"></path>
                        </svg>
                        <span><?php echo htmlspecialchars($contact['email'] ?? '305269@deped.gov.ph'); ?></span>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="<?php echo htmlspecialchars($contact['facebook_url'] ?? 'https://www.facebook.com/DepEdTayoBaguioCityNHS'); ?>" aria-label="Facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path d="M18 2h-3a4 4 0 0 0-4 4v3H8v3h3v7h3v-7h3l1-3h-4V6a1 1 0 0 1 1-1h2z"></path>
                        </svg></a>
                    <a href="<?php echo htmlspecialchars($contact['youtube_url'] ?? 'https://www.youtube.com/@warrenambat'); ?>" aria-label="YouTube"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path
                                d="M22 8s-.2-1.4-.8-2c-.7-.8-1.5-.9-3.2-1-1.9-.2-7.9-.2-7.9-.2S4.6 5 3 5.2C1.6 5.4 1 6.2.8 7.2.3 8.8 0 12 0 12s0 3.2.8 4.8c.2 1 0 1.8 2.2 2 1.5.1 5.3.2 5.3.2s6 .0 7.9 0c1.7 0 2.5-.1 3.2-1 .6-.6.8-2 .8-2s.3-1.7.3-3.4S22 8 22 8z">
                            </path>
                            <polygon points="9.75 15.02 15.5 11.99 9.75 8.96 9.75 15.02"></polygon>
                        </svg></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    $path = 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    include('includes/footer.php') ?>
    
    <script>
        // Card animation on scroll using Intersection Observer
        const cardObserverOptions = {
            threshold: 0.25, // Trigger when 25% of card is visible
            rootMargin: '0px'
        };
        
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Card is in view - pop in
                    entry.target.classList.add('in-view');
                    entry.target.classList.remove('out-view');
                } else {
                    // Card is out of view - pop out
                    entry.target.classList.remove('in-view');
                    entry.target.classList.add('out-view');
                }
            });
        }, cardObserverOptions);
        
        // Observe all animate-card elements
        document.addEventListener('DOMContentLoaded', () => {
            const animateCards = document.querySelectorAll('.animate-card');
            animateCards.forEach(card => cardObserver.observe(card));
        });
    </script>
</body>

</html>
