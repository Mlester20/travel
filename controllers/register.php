<?php
include '../includes/config.php';

$db = new Database();
$con = $db->getConnection();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        try{
            $name = $con->real_escape_string(trim($_POST['fullname']));
            $email = $con->real_escape_string(trim($_POST['email']));
            $password = $con->real_escape_string(md5(trim($_POST['password'])));
            $confirm_password = $con->real_escape_string(trim(md5($_POST['confirm_password'])));

            //check if password and confirm password match
            if($password != $confirm_password){
                echo "<script>alert('Password and Confirm Password do not match'); window.location.href='../register.php';</script>";
                exit();
            }else{
                //preapare and bind
                $stmt = $con->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $password);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    echo "<script>alert('Registration successful! You can now log in.'); window.location.href='../index.php';</script>";
                    exit();
                }else{
                    echo "<script>alert('Registration failed! Please try again.'); window.location.href='../register.php';</script>";
                    exit();
                }
        }

        }catch(Exception $e){
            die('Error: ' . $e->getMessage());
        }
    }

?>