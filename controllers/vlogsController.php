<?php 
session_start();
require '../includes/config.php';

$db = new Database();
$con = $db->getConnection();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create_post') {
        $user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = 'active'; // Default status for new posts
        
        // Handle single image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tempName = $_FILES['image']['tmp_name'];
            $originalName = $_FILES['image']['name'];
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $extension;
            $uploadPath = dirname(__DIR__) . '/uploads/' . $newFileName;
            
            if (move_uploaded_file($tempName, $uploadPath)) {
                $image_path = 'uploads/' . $newFileName;
                
                try {
                    $stmt = $con->prepare("INSERT INTO posts (user_id, title, description, image_path, posted_at, status) VALUES (?, ?, ?, ?, NOW(), ?)");
                    $stmt->bind_param("issss", $user_id, $title, $description, $image_path, $status);
                    
                    if ($stmt->execute()) {
                        echo json_encode(['status' => 'success', 'message' => 'Post created successfully']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to create post']);
                    }
                } catch(Exception $e) {
                    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Image is required']);
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch all active posts with user information
    try {
        $stmt = $con->prepare("
            SELECT 
                p.*, 
                u.name as author_name 
            FROM posts p 
            JOIN users u ON p.user_id = u.user_id 
            WHERE p.status = 'active'
            ORDER BY p.posted_at DESC
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        
        echo json_encode(['status' => 'success', 'data' => $posts]);
    } catch(Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>