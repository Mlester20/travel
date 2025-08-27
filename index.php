<?php
include 'includes/config.php';
include 'includes/createUniqueId.php';

$db = new Database();
$con = $db->getConnection();

try {
    $insert = $con->prepare("INSERT INTO users (user_id, name, email, password) VALUES (?, ?, ?, ?)");
    $unique_id = createUniqueId();
    $name = "John Doe";
    $email = "johndoe@example.com";
    $password = password_hash("password123", PASSWORD_BCRYPT);

    $insert->bind_param("ssss", $unique_id, $name, $email, $password);
    $insert->execute();

    echo "User inserted successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Signup | <?php include 'includes/title.php'; ?> </title>
</head>
<body>
    
</body>
</html>