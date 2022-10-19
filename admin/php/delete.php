<?php

include "../../db/db.php";

if(isset($_POST['delete'])){

    $id = $_POST['id-no'];
    $stud_no = $_POST['stud_no'];


    $sql = "DELETE FROM id_form WHERE stud_id = '$stud_no'";
    $conn->query($sql) or die($conn->error);

    header("Location: ../?page=id_list");
    

}



if(isset($_POST['delete-request'])){

    $stud_no = $_POST['stud_no'];


    $sql = "DELETE FROM request WHERE stud_id = '$stud_no'";
    $conn->query($sql) or die($conn->error);

    $success = "Sucess";
    header("Location: ../?page=request&success=$success");
    

}


if(isset($_POST['delete-student'])){

    $stud_no = $_POST['stud_no'];


    $sql = "DELETE FROM users WHERE stud_id = '$stud_no'";
    $conn->query($sql) or die($conn->error);

    $newsql = "DELETE FROM id_form WHERE stud_id = '$stud_no'";
    $conn->query($sql) or die($conn->error);

    $success = "Sucess";
    header("Location: ../?page=students&success=$success");
    

}


if(isset($_POST['delete-admin'])){

    $id = $_POST['id'];


    $sql = "DELETE FROM admin WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);
    
    header("Location: ../?page=admin");
    

}