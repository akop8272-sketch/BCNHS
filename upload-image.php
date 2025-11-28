<?php
// Image upload handler for Summernote

$response = ['success' => false, 'error' => 'Unknown error'];

try {
    // Check if file is uploaded
    if (!isset($_FILES['image'])) {
        $response['error'] = 'No file uploaded';
        echo json_encode($response);
        exit;
    }

    $file = $_FILES['image'];
    $filename = $file['name'];
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    // Validate file type
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($extension, $allowed)) {
        $response['error'] = 'Invalid file type. Only JPG, JPEG, PNG, GIF, and WEBP are allowed.';
        echo json_encode($response);
        exit;
    }

    // Create uploads directory if it doesn't exist
    $uploadDir = __DIR__ . '/uploads/content-images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Generate unique filename
    $newFilename = time() . '_' . uniqid() . '.' . $extension;
    $uploadPath = $uploadDir . $newFilename;

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        $response['success'] = true;
        $response['url'] = '/websys/BCNHS/uploads/content-images/' . $newFilename;
        echo json_encode($response);
    } else {
        $response['error'] = 'Failed to move uploaded file';
        echo json_encode($response);
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
    echo json_encode($response);
}
