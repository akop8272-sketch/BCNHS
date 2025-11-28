<?php
include('../includes/auth.php');
requireLogin();

include('../functions/functions.php');
$facultyModule = new FacultyModule();
$faculties = $facultyModule->fetchFaculty();
$staffModule = new FacultyStaffModule();
$staffMembers = $staffModule->fetchFacultyStaff();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties & Staff - BCNHS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <main class="faculties-staff-main">
        <h1 style="text-align: center; margin-bottom: 2rem; font-size: 2.5rem; font-weight: 700; color: white; background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); padding: 2rem 1rem; border-radius: 10px; margin: 0 1rem 2rem 1rem;">Faculties & Staff</h1>
        <div class="faculties-container">
            <!-- Side Navigation -->
            <aside class="faculties-sidebar">
                <nav class="faculties-nav">
                    <h3 class="nav-title">Departments</h3>
                    <ul class="nav-list">
                        <?php foreach($faculties as $index => $faculty){ ?>
                        <li><a href="#dept-<?php echo $index; ?>" class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" data-dept="<?php echo $index; ?>"><?php echo $faculty['name'] ?></a></li>
                        <?php }?>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <section class="faculties-content">
                <?php foreach($faculties as $index => $faculty){ ?>
                <!-- Department Section -->
                <div id="dept-<?php echo $index; ?>" class="department-section <?php echo $index === 0 ? 'active' : ''; ?>">
                    <!-- Head of Department -->
                    <div class="department-head">
                        <div class="head-card">
                            <div class="head-photo">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100">
                                    <circle cx="50" cy="50" r="50" fill="#f0f4f8"/>
                                    <circle cx="50" cy="35" r="15" fill="#dc2626"/>
                                    <path d="M 30 70 Q 30 55 50 55 Q 70 55 70 70 L 70 90 Q 70 90 50 90 Q 30 90 30 90 Z" fill="#dc2626" opacity="0.8"/>
                                </svg>
                            </div>
                            <div class="head-info">
                                <h3 class="head-name"><?php echo $faculty['name'] ?></h3>
                                <p class="head-position">Faculty Department</p>
                            </div>
                        </div>
                    </div>

                    <!-- Staff Members -->
                    <h4 class="staff-title">Faculty Members</h4>
                    <div class="staff-grid">
                        <?php 
                        $deptStaff = array_filter($staffMembers, function($staff) use ($faculty) {
                            return isset($staff['faculty_id']) && $staff['faculty_id'] == $faculty['id'];
                        });
                        
                        if(count($deptStaff) > 0) {
                            foreach($deptStaff as $staff){ ?>
                            <div class="staff-card">
                                <div class="staff-photo">
                                    <img src="../uploads/faculty/<?php echo $staff['imgPath'] ?>" alt="<?php echo $staff['name'] ?>">
                                </div>
                                <p class="staff-name"><?php echo $staff['name'] ?></p>
                                <p><?php echo $staff['position'] ?></p>
                            </div>
                            <?php }
                        } else {
                            echo '<p class="no-staff">No staff members available for this department.</p>';
                        }
                        ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </main>

    <script>
        // Navigation link click handler - only for department navigation
        document.querySelectorAll('.faculties-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all department navigation links and sections
                document.querySelectorAll('.faculties-nav .nav-link').forEach(l => l.classList.remove('active'));
                document.querySelectorAll('.department-section').forEach(s => s.classList.remove('active'));
                
                // Add active class to clicked link and corresponding section
                this.classList.add('active');
                const deptId = this.getAttribute('href');
                const deptSection = document.querySelector(deptId);
                if(deptSection) {
                    deptSection.classList.add('active');
                }
            });
        });
    </script>

    <?php 
    $path = '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    include('../includes/footer.php'); ?>
</body>
</html>
