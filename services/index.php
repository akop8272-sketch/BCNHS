<?php 
include('../functions/functions.php');
$servicesModule = new ServicesModule();
$services = $servicesModule->fetchServices();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="services-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Services</h1>
        <div class="services-wrapper">
            <!-- Left Column: Services Navigation -->
            <aside class="services-sidebar">
                <h2 class="services-sidebar-title">Services</h2>
                <nav class="services-nav">
                    <ul class="services-list">
                        <?php foreach($services as $index => $service) { ?>
                        <li><a href="#service-<?php echo $index; ?>" class="service-link <?php echo $index === 0 ? 'active' : ''; ?>" data-service="<?php echo $index; ?>"><?php echo $service['title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </aside>

            <!-- Right Column: Service Details -->
            <section class="services-content">
                <?php foreach($services as $index => $service) { ?>
                <!-- Service Detail -->
                <div id="service-<?php echo $index; ?>" class="service-detail <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="service-header">
                        <div class="service-icon">
                            <?php if(!empty($service['imgPath']) && file_exists('../uploads/services/' . $service['imgPath'])): ?>
                                <img src="../uploads/services/<?php echo $service['imgPath'] ?>" alt="<?php echo $service['title'] ?>">
                            <?php endif; ?>
                        </div>
                        <h2 class="service-title"><?php echo $service['title'] ?></h2>
                    </div>
                    <div class="service-body">
                        <?php echo $service['content'] ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        // Navigation link click handler - only for service navigation
        document.querySelectorAll('.services-nav .service-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all service links and detail sections
                document.querySelectorAll('.services-nav .service-link').forEach(l => l.classList.remove('active'));
                document.querySelectorAll('.service-detail').forEach(s => s.classList.remove('active'));
                
                // Add active class to clicked link and corresponding detail
                this.classList.add('active');
                const serviceId = this.getAttribute('href');
                const serviceDetail = document.querySelector(serviceId);
                if(serviceDetail) {
                    serviceDetail.classList.add('active');
                }
            });
        });

        // Handle hash on page load
        function handleHashLoad() {
            const hash = window.location.hash;
            if(hash) {
                const serviceDetail = document.querySelector(hash);
                const serviceLink = document.querySelector('.services-nav a[href="' + hash + '"]');
                
                if(serviceDetail && serviceLink) {
                    // Remove active from all
                    document.querySelectorAll('.services-nav .service-link').forEach(l => l.classList.remove('active'));
                    document.querySelectorAll('.service-detail').forEach(s => s.classList.remove('active'));
                    
                    // Add active to matching elements
                    serviceLink.classList.add('active');
                    serviceDetail.classList.add('active');
                    
                    // Scroll to service detail
                    serviceDetail.scrollIntoView({ behavior: 'smooth' });
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
