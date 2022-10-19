<?php

include "../../db/db.php";



if(isset($_POST['done'])){

    $id = $_POST['id'];
    $status = 1;
    $read = 0;
    
    $sql = "UPDATE `users` SET `status` = '$status', `read_unread` = '$read' WHERE `id` = '$id'";
    $conn->query($sql) or die($conn->error);
    

    header("Location: ../?page=id_list");
    
    
}

if(isset($_POST['undone'])){

    $id = $_POST['id'];
    $status = 0;
    
    $sql = "UPDATE `users` SET `status` = '$status' WHERE `id` = '$id'";
    $conn->query($sql) or die($conn->error);

    header("Location: ../?page=id_list");
    
}