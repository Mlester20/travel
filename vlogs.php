<?php
require 'includes/config.php';
session_start();

$db = new Database();
$con = $db->getConnection();

    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vlogs | <?php include 'includes/title.php'; ?> </title>
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


</body>
</html>