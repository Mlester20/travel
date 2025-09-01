<?php
// Start session first before any output
session_start();

require '../includes/config.php';

// Clean any previous output
ob_clean();

// Set content type to JSON
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Helper function to calculate time ago (move before try block)
function timeAgo($datetime) {
    $time = time() - strtotime($datetime);
    
    if ($time < 60) return 'just now';
    if ($time < 3600) return floor($time/60) . ' minutes ago';
    if ($time < 86400) return floor($time/3600) . ' hours ago';
    if ($time < 2592000) return floor($time/86400) . ' days ago';
    if ($time < 31536000) return floor($time/2592000) . ' months ago';
    return floor($time/31536000) . ' years ago';
}

try {
    $db = new Database();
    $con = $db->getConnection();
    
    // Store current user id
    $user_id = $_SESSION['user_id'] ?? null;
    
    // Check if user is logged in
    if (!$user_id) {
        http_response_code(401);
        echo json_encode([
            'success' => false,
            'error' => 'User not authenticated'
        ]);
        exit;
    }
    
    // First, let's check if the posts table exists and what columns it has
    $check_table = $con->query("SHOW COLUMNS FROM posts");
    if (!$check_table) {
        throw new Exception("Posts table not found");
    }
    
    // Get column names to check what's available
    $columns = [];
    while ($row = $check_table->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
    
    // Build query based on available columns (match your actual table structure)
    $query = "SELECT p.id, p.title, p.description, p.posted_at";
    
    // Add optional columns if they exist
    if (in_array('image_path', $columns)) {
        $query .= ", p.image_path";
    }
    if (in_array('edited_at', $columns)) {
        $query .= ", p.edited_at";
    }
    
    // Check if users table join is needed
    $check_users = $con->query("SHOW TABLES LIKE 'users'");
    if ($check_users && $check_users->num_rows > 0) {
        $query .= ", u.name, u.profile FROM posts p LEFT JOIN users u ON p.user_id = u.user_id";
    } else {
        $query .= " FROM posts p";
    }
    
    // Add WHERE clause
    if (in_array('status', $columns)) {
        $query .= " WHERE p.user_id = ? AND p.status = 'active'";
    } else {
        $query .= " WHERE p.user_id = ?";
    }
    
    $query .= " ORDER BY p.posted_at DESC";
    
    // Perform query and bind results
    $stmt = $con->prepare($query);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $con->error);
    }
    
    if (in_array('status', $columns)) {
        $stmt->bind_param("i", $user_id);
    } else {
        $stmt->bind_param("i", $user_id);
    }
    
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    
    // Format the data for frontend (match your table columns)
    $formatted_posts = [];
    foreach ($posts as $post) {
        $formatted_posts[] = [
            'id' => $post['id'],
            'title' => $post['title'] ?? 'Untitled',
            'content' => $post['description'] ?? '', // Map description to content for frontend
            'image_url' => $post['image_path'] ?? null, // Map image_path to image_url for frontend
            'posted_at' => $post['posted_at'],
            'edited_at' => $post['edited_at'] ?? null,
            'likes_count' => 0, // Default since not in your table
            'comments_count' => 0, // Default since not in your table
            'username' => $post['name'] ?? 'Unknown',
            'profile_picture' => $post['profile_picture'] ?? null,
            'time_ago' => timeAgo($post['posted_at'])
        ];
    }
    
    echo json_encode([
        'success' => true,
        'posts' => $formatted_posts,
        'total' => count($formatted_posts),
        'debug' => [
            'user_id' => $user_id,
            'available_columns' => $columns,
            'query' => $query
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage(),
        'debug' => [
            'user_id' => $_SESSION['user_id'] ?? 'not set',
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]
    ]);
}
?>