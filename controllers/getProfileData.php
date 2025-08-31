<?php
// Get the absolute path to the root directory
$rootPath = str_replace('controllers', '', __DIR__);

// Include config file using absolute path
require_once $rootPath . 'includes/config.php';

function getProfileData($profile_user_id = null) {
    // If no specific user_id provided, use the logged-in user's id
    $viewing_user_id = $profile_user_id ?? $_SESSION['user_id'];
    
    $db = new Database();
    $conn = $db->connect();
    
    $query = "SELECT user_id, name, profile, bio FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $viewing_user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    
    if (!$userData) {
        return null;
    }
    
    // Add the is_own_profile flag
    $userData['is_own_profile'] = ($viewing_user_id == $_SESSION['user_id']);
    
    return $userData;
}

// If this file is accessed directly via AJAX
if (isset($_GET['user_id'])) {
    define('DIRECT_ACCESS', true);
    $profileData = getProfileData($_GET['user_id']);
    header('Content-Type: application/json');
    echo json_encode($profileData);
    exit();
}
?>
