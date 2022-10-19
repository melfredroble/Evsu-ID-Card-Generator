<?php

include "../db/db.php";

if(isset($_POST['adminId'])){
    
    $id = $_POST['adminId'];

    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $resultset = $conn->query($sql) or die($conn->error);
    $data = array();
        while( $rows = mysqli_fetch_assoc($resultset) ) {
            $data = $rows;
        }
        echo json_encode($data);
}