<?php

include ('../db/db.php');

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $stud_id = $_POST['stud_id'];
    $pwd = $_POST['pwd'];
    $confirm_pwd = $_POST['confirm_pwd'];
    $hashed_pwd = password_hash($confirm_pwd, PASSWORD_DEFAULT);


    $userid = mysqli_query($conn, "SELECT * FROM users WHERE stud_id = '$stud_id'");
    $result = mysqli_num_rows($userid);

    if($result > 0) {

        $error = "Student number already exist.";
        header("Location: ../signup.php?error=$error");


    } else {

        if($pwd === $confirm_pwd) {

            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `stud_id`, `password`) VALUES ('$fname', '$lname', '$stud_id', '$hashed_pwd')";
            $query = $conn->query($sql) or die($conn->error);
        
            $success = "Please sign in!";
            header("Location: ../login.php?success=$success");
        
            } else {
                $error = "Password doesn't matched.";
                header("Location: ../signup.php?error=$error");
            }

    }


}