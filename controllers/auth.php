<?php
include '../includes/config.php';
session_start();

$db = new Database();
$con = $db->getConnection();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $con->real_escape_string(trim($_POST['email']));
        $password = $con->real_escape_string(md5(trim($_POST['password'])));

        //perform query using prepared statements
        $stmt = $con->prepare("SELECT user_id, name FROM users WHERE email = ? AND password =  ? ");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            header("Location: ../home.php");
        } else {
           echo "<script>alert('Invalid email or password');</script>";
            header("Location: ../index.php");
        }
    }

?>