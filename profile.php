<?php
session_start();
require 'includes/config.php';
define('DIRECT_ACCESS', false);
require 'controllers/getProfileData.php';


if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

// Get the profile user_id from URL, if not set, show current user's profile
$profile_user_id = isset($_GET['id']) ? (int)$_GET['id'] : $_SESSION['user_id'];

// Get profile data
$profileData = getProfileData($profile_user_id);

if (!$profileData) {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php include 'includes/title.php'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'travel-blue': '#0EA5E9',
                        'travel-orange': '#F97316',
                        'travel-green': '#10B981'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <?php include 'components/header.php'; ?>
    
    <?php include 'components/profileUI.php'; ?>
    
    <script>
        // Initialize profile data from server-side PHP
        const profileData = <?php echo json_encode($profileData); ?>;
        
        // Update profile information immediately
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('profileName').textContent = profileData.name || 'No name';
            document.getElementById('profileBio').textContent = profileData.bio || 'No bio available';
        });
    </script>
    
    <?php if ($profileData['is_own_profile']): ?>
    <script src="js/fetchProfile.js"></script>
    <?php endif; ?>

    <!-- external script -->
    <script src="js/fetchPost.js"></script>
</body>
</html>