<?php


include "../../db/db.php";

if(isset($_POST['add-admin'])){

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `admin`(`username`, `password`) VALUES('$uname','$pwdhashed')";
    $conn->query($sql) or die($conn->error);

    header("Location: ../?page=admin");
}