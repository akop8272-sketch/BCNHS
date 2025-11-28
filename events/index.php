<?php
include('../functions/functions.php');
$eventsModule = new EventsModule();
$events = $eventsModule->fetchEvents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="events-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Events</h1>
        <div class="events-wrapper">
            <!-- Left Column: Event Cards -->
            <aside class="events-sidebar">
                <div class="events-list">
                    <?php foreach($events as $index => $event) {?>
                    <a href="#event-<?php echo $index; ?>" class="event-card-link <?php echo $index === 0 ? 'active' : ''; ?>" data-event="<?php echo $index; ?>">
                        <div class="event-card">
                            <div class="event-card-image">
                                <img src="../uploads/events/<?php echo $event['imgPath'] ?>" alt="<?php echo $event['title'] ?>" />
                            </div>
                            <div class="event-card-content">
                                <h3 class="event-card-title"><?php echo $event['title'] ?></h3>
                                <p class="event-card-overview"><?php echo substr($event['overview'] ?? $event['content'], 0, 100) . '...' ?></p>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </aside>

            <!-- Right Column: Event Details -->
            <section class="events-content">
                <?php foreach($events as $index => $event) { ?>
                <div id="event-<?php echo $index; ?>" class="event-detail <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="event-headline-image" style="height: max-content;">
                        <img src="../uploads/events/<?php echo $event['imgPath'] ?>" alt="<?php echo $event['title'] ?>" />
                    </div>
                    <h1 class="event-title"><?php echo $event['title'] ?></h1>
                    <div class="event-meta">
                        <span class="event-date">📅 <?php echo $event['date'] ?></span>
                        <span class="event-location">📍 <?php echo $event['location'] ?></span>
                    </div>
                    <div class="event-body">
                        <?php echo $event['content'] ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        function initEventNavigation() {
            // Navigation link click handler
            document.querySelectorAll('.events-sidebar .event-card-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all cards and details
                    document.querySelectorAll('.events-sidebar .event-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.event-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active class to clicked card and corresponding detail
                    this.classList.add('active');
                    const eventId = this.getAttribute('href');
                    const eventDetail = document.querySelector(eventId);
                    if(eventDetail) {
                        eventDetail.classList.add('active');
                    }
                });
            });

            // Handle hash on page load
            const hash = window.location.hash;
            if(hash) {
                const eventDetail = document.querySelector(hash);
                const eventCard = document.querySelector('.events-sidebar a[href="' + hash + '"]');
                
                if(eventDetail && eventCard) {
                    // Remove active from all
                    document.querySelectorAll('.events-sidebar .event-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.event-detail').forEach(d => d.classList.remove('active'));
                    
                    // Add active to matching elements
                    eventCard.classList.add('active');
                    eventDetail.classList.add('active');
                }
            }
        }

        // Initialize on page load
        if(document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initEventNavigation);
        } else {
            initEventNavigation();
        }

        // Also handle if hash changes
        window.addEventListener('hashchange', function() {
            const hash = window.location.hash;
            if(hash) {
                const eventDetail = document.querySelector(hash);
                const eventCard = document.querySelector('.events-sidebar a[href="' + hash + '"]');
                
                if(eventDetail && eventCard) {
                    document.querySelectorAll('.events-sidebar .event-card-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.event-detail').forEach(d => d.classList.remove('active'));
                    eventCard.classList.add('active');
                    eventDetail.classList.add('active');
                }
            }
        });
    </script>

    <?php
    $path = "../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
    include('../includes/footer.php'); ?>
</body>
</html>
