<?php

include ('../db/db.php');

if(isset($_POST['submit'])) {

    $stud_id = $_POST['stud_id'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM `users` WHERE stud_id = '$stud_id'";
    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){

        if(password_verify($password, $row['password'])){

            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userStudId'] = $row['stud_id'];
            $_SESSION['userName'] = $row['first_name'];
            $_SESSION['userLname'] = $row['last_name'];
            header("Location: ../?page=homepage");
            
        } else {

            $error = "Wrong password";
            header("Location: ../login.php?error=$error");

        }

    } else {

        $error = "User not found";
        header("Location: ../login.php?error=$error");
    }


}