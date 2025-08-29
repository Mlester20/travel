<?php
session_start();
require_once dirname(__DIR__) . '/includes/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit();
}

$db = new Database();
$con = $db->getConnection();
$user_id = $_SESSION['user_id'];

try {
    // Fetch user profile data with your actual database columns
    $stmt = $con->prepare("SELECT user_id, name, bio, email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $user]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
} catch(Exception $e) {
    die('Error: ' . $e->getMessage());
}

?>