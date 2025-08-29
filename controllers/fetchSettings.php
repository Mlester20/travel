<?php
session_start();
require_once dirname(__DIR__) . '/includes/config.php';

if(!isset($_SESSION['user_id'])){
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit();
}

$db = new Database();
$con = $db->getConnection();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $con->prepare("SELECT user_id, name, bio, email FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $settings = $result->fetch_assoc();
            echo json_encode(['status' => 'success', 'data' => $settings]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
        }
    } catch(Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Start transaction
        $con->begin_transaction();

        // Update profile information
        $stmt = $con->prepare("UPDATE users SET name = ?, email = ?, bio = ? WHERE user_id = ?");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        
        $stmt->bind_param("sssi", $name, $email, $bio, $user_id);
        $stmt->execute();

        // If password is being changed
        if (!empty($_POST['newPassword']) && !empty($_POST['currentPassword'])) {
            // Verify current password
            $stmt = $con->prepare("SELECT password FROM users WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if (password_verify($_POST['currentPassword'], $user['password'])) {
                if ($_POST['newPassword'] === $_POST['confirmPassword']) {
                    // Update password
                    $newPasswordHash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                    $stmt = $con->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                    $stmt->bind_param("si", $newPasswordHash, $user_id);
                    $stmt->execute();
                } else {
                    throw new Exception('New passwords do not match');
                }
            } else {
                throw new Exception('Current password is incorrect');
            }
        }

        // Commit transaction
        $con->commit();
        echo json_encode(['status' => 'success', 'message' => 'Settings updated successfully']);
    } catch(Exception $e) {
        // Rollback transaction on error
        $con->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>