<?php
require_once '../includes/config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize database connection
$db = new Database();
$conn = $db->connect();

// Get search query
$query = isset($_POST['query']) ? $_POST['query'] : '';

if (empty($query)) {
    echo json_encode([]);
    exit;
}

// Prepare search query
$searchQuery = "SELECT user_id, name, profile 
               FROM users 
               WHERE name LIKE ? 
               AND user_id != ? 
               LIMIT 10";

$searchTerm = "%{$query}%";
$currentUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

$stmt = $conn->prepare($searchQuery);
$stmt->bind_param("si", $searchTerm, $currentUserId);
$stmt->execute();

$result = $stmt->get_result();
$users = [];

while ($row = $result->fetch_assoc()) {
    // Clean the data before sending
    $users[] = [
        'user_id' => $row['user_id'],
        'name' => htmlspecialchars($row['name']),
        'profile' => $row['profile'] ? htmlspecialchars($row['profile']) : null
    ];
}

// Set proper JSON header
header('Content-Type: application/json');
echo json_encode($users);

$stmt->close();
$conn->close();
