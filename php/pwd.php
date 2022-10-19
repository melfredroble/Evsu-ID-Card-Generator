<?php

include "../db/db.php";


if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];



    $sql = "SELECT * FROM `users` WHERE stud_id = '$id'";
    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    
    if(password_verify($password, $row['password'])){

        $hashed_pwd = password_hash($new_password, PASSWORD_DEFAULT);
        $newsql = "UPDATE users SET password = '$hashed_pwd'";
        $conn->query($newsql) or die($conn->error);

        $success = "Password reset successfully";
        header("Location: ../?page=changepwd&success=$success");


    } else {

        $error = "Wrong password";
        header("Location: ../?page=changepwd&error=$error");

    }

}
