<?php
include('../functions/functions.php');
$aboutModule = new AboutModule();
$about = $aboutModule->getAbout(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="about-main">
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="about-hero-content">
                <h1 class="about-hero-title">About BCNHS</h1>
                <p class="about-hero-subtitle">Discover our legacy, mission, and values</p>
            </div>
        </section>

        <!-- History Section -->
        <section class="about-section history-section">
            <div class="about-container">
                <div class="section-header">
                    <h2 class="section-main-title">Our History</h2>
                    <div class="section-divider"></div>
                </div>

                <!-- History Description -->
                <div class="history-description">
                    <h3>Our Journey</h3>
                    <p>
                        <?php echo $about['history']; ?>
                    </div>
            </div>
        </section>

        <!-- School Hymn Section -->
        <section class="about-section hymn-section">
            <div class="about-container">
                <div class="section-header">
                    <h2 class="section-main-title">School Hymn</h2>
                    <div class="section-divider"></div>
                </div>

                <div class="hymn-wrapper">
                    <div class="hymn-card">
                        <div class="hymn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="50" fill="#0891b2" opacity="0.1"/>
                                <path d="M 30 35 Q 30 25 50 25 Q 70 25 70 35 L 70 65 Q 70 75 50 75 Q 30 75 30 65 Z" fill="none" stroke="#0891b2" stroke-width="2"/>
                                <path d="M 40 40 L 40 50" stroke="#0891b2" stroke-width="2"/>
                                <path d="M 50 38 L 50 52" stroke="#0891b2" stroke-width="2"/>
                                <path d="M 60 40 L 60 50" stroke="#0891b2" stroke-width="2"/>
                                <path d="M 45 58 L 55 58 L 55 65 Q 50 70 45 65 Z" fill="#0891b2"/>
                            </svg>
                        </div>
                        <div class="hymn-content">
                            <h3 class="hymn-title">HYMMS</h3>
                            <div class="hymn-lyrics">
                                <div class="verse">
                                    <p class="lyrics">
                                        <?php echo $about['hymm']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- School Values -->
                <div class="school-values">
                    <h3 class="values-title">Core Values</h3>
                    <div class="values-grid">
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="#dc2626" opacity="0.1"/>
                                    <path d="M 50 20 L 60 40 L 80 40 L 65 55 L 72 75 L 50 60 L 28 75 L 35 55 L 20 40 L 40 40 Z" fill="#dc2626"/>
                                </svg>
                            </div>
                            <h4 class="value-name">Excellence</h4>
                            <p class="value-description">Striving for the highest standards in all endeavors</p>
                        </div>

                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="#dc2626" opacity="0.1"/>
                                    <path d="M 50 25 C 40 25 32 33 32 43 C 32 53 50 73 50 73 C 50 73 68 53 68 43 C 68 33 60 25 50 25 Z M 50 50 C 45 50 41 46 41 41 C 41 36 45 32 50 32 C 55 32 59 36 59 41 C 59 46 55 50 50 50 Z" fill="#dc2626"/>
                                </svg>
                            </div>
                            <h4 class="value-name">Integrity</h4>
                            <p class="value-description">Upholding honesty and strong moral principles</p>
                        </div>

                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="#dc2626" opacity="0.1"/>
                                    <circle cx="35" cy="40" r="12" fill="#dc2626"/>
                                    <circle cx="65" cy="40" r="12" fill="#dc2626"/>
                                    <path d="M 30 60 Q 30 70 50 75 Q 70 70 70 60" fill="none" stroke="#dc2626" stroke-width="2"/>
                                </svg>
                            </div>
                            <h4 class="value-name">Community</h4>
                            <p class="value-description">Building strong bonds and working together</p>
                        </div>

                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="#dc2626" opacity="0.1"/>
                                    <path d="M 50 25 L 65 35 L 70 55 L 50 65 L 30 55 L 35 35 Z" fill="none" stroke="#dc2626" stroke-width="2"/>
                                    <path d="M 50 40 L 50 60 M 40 50 L 60 50" stroke="#dc2626" stroke-width="2"/>
                                </svg>
                            </div>
                            <h4 class="value-name">Innovation</h4>
                            <p class="value-description">Embracing creativity and forward-thinking ideas</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>
</html>
