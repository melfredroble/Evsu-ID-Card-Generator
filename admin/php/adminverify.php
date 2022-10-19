<?php


include "../../db/db.php";

session_start();


if(isset($_POST['submit'])){

    $uname = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE username = '$uname'";
    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){

        if(password_verify($pwd, $row['password'])){

            $_SESSION['userType'] = $row['usertype'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userId'] = $row['id'];

            header("Location: ../?page=dashboard");

        } else {

            $error = "Wrong Password";
            header("Location: ../login.php?error=$error");

        }
        
    } else {

        $error = "Account doesn't exist";
        header("Location: ../login.php?error=$error");

    }

}

