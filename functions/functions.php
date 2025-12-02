<?php

// Database connection class
class Database {
    private $pdo;

    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'bcnhs';
        $charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die("connection failed: " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}

// ===================== ABOUT TABLE =====================
class AboutModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchAbout() {
        $fetch = $this->pdo->query("SELECT * FROM about");
        return $fetch->fetchAll();
    }

    public function getAbout($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM about WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createAbout($history, $hymm) {
        $stmt = $this->pdo->prepare("INSERT INTO about (history, hymm) VALUES (:history, :hymm)");
        $stmt->execute([
            ':history' => $history,
            ':hymm' => $hymm,
        ]);
    }

    public function updateAbout(int $id, $history, $hymm) {
        $stmt = $this->pdo->prepare("UPDATE about SET history = :history, hymm = :hymm WHERE id = :id");
        $stmt->execute([
            ':history' => $history,
            ':hymm' => $hymm,
            ':id' => $id,
        ]);
    }

    public function deleteAbout(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM about WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== ACHIEVEMENTS TABLE =====================
class AchievementsModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchAchievements() {
        $fetch = $this->pdo->query("SELECT * FROM achievements");
        return $fetch->fetchAll();
    }

    public function getAchievement($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM achievements WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createAchievement($title, $overview, $content, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("INSERT INTO achievements (title, overview, content, imgPath, created_by) VALUES (:title, :overview, :content, :imgPath, :created_by)");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateAchievement(int $id, $title, $overview, $content, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("UPDATE achievements SET title = :title, overview = :overview, content = :content, imgPath = :imgPath, created_by = :created_by WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
            ':id' => $id,
        ]);
    }

    public function deleteAchievement(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM achievements WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== ARTICLES TABLE =====================
class ArticlesModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchArticles() {
        $fetch = $this->pdo->query("SELECT * FROM articles");
        return $fetch->fetchAll();
    }

    public function getArticle($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createArticle($title, $overview, $content, $author, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, overview, content, author, imgPath, created_by) VALUES (:title, :overview, :content, :author, :imgPath, :created_by)");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':author' => $author,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateArticle(int $id, $title, $overview, $content, $date, $author, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("UPDATE articles SET title = :title, overview = :overview, content = :content, date = :date, author = :author, imgPath = :imgPath, created_by = :created_by WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':date' => $date,
            ':author' => $author,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
            ':id' => $id,
        ]);
    }

    public function deleteArticle(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== EVENTS TABLE =====================
class EventsModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchEvents() {
        $fetch = $this->pdo->query("SELECT * FROM events");
        return $fetch->fetchAll();
    }

    public function getEvent($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createEvent($title, $overview, $content, $date, $location, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("INSERT INTO events (title, overview, content, date, location, imgPath, created_by) VALUES (:title, :overview, :content, :date, :location, :imgPath, :created_by)");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':date' => $date,
            ':location' => $location,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateEvent(int $id, $title, $overview, $content, $date, $location, $imgPath, $created_by = null) {
        $stmt = $this->pdo->prepare("UPDATE events SET title = :title, overview = :overview, content = :content, date = :date, location = :location, imgPath = :imgPath, created_by = :created_by WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':date' => $date,
            ':location' => $location,
            ':imgPath' => $imgPath,
            ':created_by' => $created_by,
            ':id' => $id,
        ]);
    }

    public function deleteEvent(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== FACULTY TABLE =====================
class FacultyModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchFaculty() {
        $fetch = $this->pdo->query("SELECT * FROM faculty");
        return $fetch->fetchAll();
    }

    public function getFaculty($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM faculty WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createFaculty($name) {
        $stmt = $this->pdo->prepare("INSERT INTO faculty (name) VALUES (:name)");
        $stmt->execute([
            ':name' => $name,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateFaculty(int $id, $name) {
        $stmt = $this->pdo->prepare("UPDATE faculty SET name = :name WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':id' => $id,
        ]);
    }

    public function deleteFaculty(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM faculty WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== FACULTY-STAFF TABLE =====================
class FacultyStaffModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchFacultyStaff() {
        $fetch = $this->pdo->query("SELECT fs.*, f.name as faculty_name FROM `faculty-staff` fs LEFT JOIN faculty f ON fs.faculty_id = f.id");
        return $fetch->fetchAll();
    }

    public function getFacultyStaff($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM `faculty-staff` WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createFacultyStaff($faculty_id, $name, $position, $imgPath) {
        $stmt = $this->pdo->prepare("INSERT INTO `faculty-staff` (faculty_id, name, position, imgPath) VALUES (:faculty_id, :name, :position, :imgPath)");
        $stmt->execute([
            ':faculty_id' => $faculty_id,
            ':name' => $name,
            ':position' => $position,
            ':imgPath' => $imgPath,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateFacultyStaff(int $id, $faculty_id, $name, $position, $imgPath) {
        $stmt = $this->pdo->prepare("UPDATE `faculty-staff` SET faculty_id = :faculty_id, name = :name, position = :position, imgPath = :imgPath WHERE id = :id");
        $stmt->execute([
            ':faculty_id' => $faculty_id,
            ':name' => $name,
            ':position' => $position,
            ':imgPath' => $imgPath,
            ':id' => $id,
        ]);
    }

    public function deleteFacultyStaff(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM `faculty-staff` WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== PROGRAMS TABLE =====================
class ProgramsModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchPrograms() {
        $fetch = $this->pdo->query("SELECT * FROM programs");
        return $fetch->fetchAll();
    }

    public function getProgram($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM programs WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createProgram($title, $overview, $content, $imgPath) {
        $stmt = $this->pdo->prepare("INSERT INTO programs (title, overview, content, imgPath) VALUES (:title, :overview, :content, :imgPath)");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':imgPath' => $imgPath,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateProgram(int $id, $title, $overview, $content, $imgPath) {
        $stmt = $this->pdo->prepare("UPDATE programs SET title = :title, overview = :overview, content = :content, imgPath = :imgPath WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':content' => $content,
            ':imgPath' => $imgPath,
            ':id' => $id,
        ]);
    }

    public function deleteProgram(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM programs WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== RESOURCES TABLE =====================
class ResourcesModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchResources() {
        $fetch = $this->pdo->query("SELECT r.*, s.name as subject_name FROM resources r LEFT JOIN subject s ON r.subject_id = s.id");
        return $fetch->fetchAll();
    }

    public function getResource($id) {
        $stmt = $this->pdo->prepare("SELECT r.*, s.name as subject_name FROM resources r LEFT JOIN subject s ON r.subject_id = s.id WHERE r.id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createResource($title, $overview, $link, $path, $subject_id) {
        $stmt = $this->pdo->prepare("INSERT INTO resources (title, overview, link, path, subject_id) VALUES (:title, :overview, :link, :path, :subject_id)");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':link' => $link,
            ':path' => $path,
            ':subject_id' => $subject_id,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateResource(int $id, $title, $overview, $link, $path, $subject_id) {
        $stmt = $this->pdo->prepare("UPDATE resources SET title = :title, overview = :overview, link = :link, path = :path, subject_id = :subject_id WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':overview' => $overview,
            ':link' => $link,
            ':path' => $path,
            ':subject_id' => $subject_id,
            ':id' => $id,
        ]);
    }

    public function deleteResource(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM resources WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== SERVICES TABLE =====================
class ServicesModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchServices() {
        $fetch = $this->pdo->query("SELECT * FROM services");
        return $fetch->fetchAll();
    }

    public function getService($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createService($title, $content, $location, $imgPath) {
        $stmt = $this->pdo->prepare("INSERT INTO services (title, content, location, imgPath) VALUES (:title, :content, :location, :imgPath)");
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':location' => $location,
            ':imgPath' => $imgPath,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateService(int $id, $title, $content, $location, $imgPath) {
        $stmt = $this->pdo->prepare("UPDATE services SET title = :title, content = :content, location = :location, imgPath = :imgPath WHERE id = :id");
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':location' => $location,
            ':imgPath' => $imgPath,
            ':id' => $id,
        ]);
    }

    public function deleteService(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM services WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== USERS TABLE =====================
class UsersModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchUsers() {
        $fetch = $this->pdo->query("SELECT * FROM users");
        return $fetch->fetchAll();
    }

    public function getUser($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function getUserByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    public function createUser($name, $email, $password, $role) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
        ]);
    }

    public function updateUser(int $id, $name, $email, $password, $role) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
            ':id' => $id,
        ]);
    }

    public function deleteUser(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== SUBJECT TABLE =====================
class SubjectModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchSubject() {
        $fetch = $this->pdo->query("SELECT * FROM subject");
        return $fetch->fetchAll();
    }

    public function getSubject($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM subject WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createSubject($name) {
        $stmt = $this->pdo->prepare("INSERT INTO subject (name) VALUES (:name)");
        $stmt->execute([':name' => $name]);
        return $this->pdo->lastInsertId();
    }

    public function updateSubject($id, $name) {
        $stmt = $this->pdo->prepare("UPDATE subject SET name = :name WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':id' => $id,
        ]);
    }

    public function deleteSubject($id) {
        $stmt = $this->pdo->prepare("DELETE FROM subject WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

// ===================== PRINCIPAL TABLE =====================
class PrincipalModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchPrincipal() {
        $fetch = $this->pdo->query("SELECT * FROM principal");
        return $fetch->fetchAll();
    }

    public function getPrincipal($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM principal WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function updatePrincipal(int $id, $name, $introduction, $imgPath) {
        $stmt = $this->pdo->prepare("UPDATE principal SET name = :name, introduction = :introduction, imgPath = :imgPath WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':introduction' => $introduction,
            ':imgPath' => $imgPath,
            ':id' => $id,
        ]);
    }
}

// ===================== CONTACT TABLE =====================
class ContactModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function fetchContact() {
        $fetch = $this->pdo->query("SELECT * FROM contact");
        return $fetch->fetchAll();
    }

    public function getContact($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function createContact($address, $email, $facebook_url, $youtube_url, $phone = null) {
        $stmt = $this->pdo->prepare("INSERT INTO contact (address, email, facebook_url, youtube_url, phone) VALUES (:address, :email, :facebook_url, :youtube_url, :phone)");
        $stmt->execute([
            ':address' => $address,
            ':email' => $email,
            ':facebook_url' => $facebook_url,
            ':youtube_url' => $youtube_url,
            ':phone' => $phone,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateContact(int $id, $address, $email, $facebook_url, $youtube_url, $phone = null) {
        $stmt = $this->pdo->prepare("UPDATE contact SET address = :address, email = :email, facebook_url = :facebook_url, youtube_url = :youtube_url, phone = :phone WHERE id = :id");
        $stmt->execute([
            ':address' => $address,
            ':email' => $email,
            ':facebook_url' => $facebook_url,
            ':youtube_url' => $youtube_url,
            ':phone' => $phone,
            ':id' => $id,
        ]);
    }
}

// ===================== ACTIVITY LOG TABLE =====================
class ActivityLogModule {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPDO();
    }

    public function logActivity($user_id, $action, $content_type, $content_id, $content_title) {
        $stmt = $this->pdo->prepare("INSERT INTO activity_log (user_id, action, content_type, content_id, content_title, created_at) VALUES (:user_id, :action, :content_type, :content_id, :content_title, NOW())");
        $stmt->execute([
            ':user_id' => $user_id,
            ':action' => $action, // 'created', 'updated', 'deleted'
            ':content_type' => $content_type, // 'article', 'event', 'achievement'
            ':content_id' => $content_id,
            ':content_title' => $content_title,
        ]);
    }

    public function getRecentActivities($limit = 10) {
        $stmt = $this->pdo->prepare("
            SELECT al.*, u.name as user_name, u.role as user_role 
            FROM activity_log al 
            LEFT JOIN users u ON al.user_id = u.id 
            ORDER BY al.created_at DESC 
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
