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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_profile_picture') {
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile_picture'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            
            // File validation
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($fileExt, $allowedExtensions)) {
                if ($fileError === 0) {
                    if ($fileSize < 5000000) { // 5MB max
                        // Create unique filename
                        $newFileName = uniqid('profile_', true) . '.' . $fileExt;
                        $uploadPath = dirname(__DIR__) . '/uploads/profiles/' . $newFileName;
                        
                        // Create profiles directory if it doesn't exist
                        if (!file_exists(dirname(__DIR__) . '/uploads/profiles/')) {
                            mkdir(dirname(__DIR__) . '/uploads/profiles/', 0777, true);
                        }
                        
                        if (move_uploaded_file($fileTmpName, $uploadPath)) {
                            // Update database with new profile picture path
                            try {
                                $stmt = $con->prepare("UPDATE users SET profile = ? WHERE user_id = ?");
                                $relativePath = 'uploads/profiles/' . $newFileName;
                                $stmt->bind_param("si", $relativePath, $user_id);
                                
                                if ($stmt->execute()) {
                                    echo json_encode([
                                        'status' => 'success',
                                        'message' => 'Profile picture updated successfully',
                                        'path' => $relativePath
                                    ]);
                                } else {
                                    echo json_encode([
                                        'status' => 'error',
                                        'message' => 'Failed to update database'
                                    ]);
                                }
                            } catch(Exception $e) {
                                echo json_encode([
                                    'status' => 'error',
                                    'message' => $e->getMessage()
                                ]);
                            }
                        } else {
                            echo json_encode([
                                'status' => 'error',
                                'message' => 'Failed to move uploaded file'
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'File size too large. Maximum size is 5MB'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Error uploading file'
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid file type. Allowed types: JPG, JPEG, PNG, GIF'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No file uploaded'
            ]);
        }
    }
}
?>
