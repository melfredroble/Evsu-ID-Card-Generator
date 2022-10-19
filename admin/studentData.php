<?php

include "../db/db.php";

if(isset($_POST['studId'])){
    
    $id = $_POST['studId'];

    $sql = "SELECT users.id, users.stud_id, users.first_name, users.last_name, id_form.img, id_form.middle_name, id_form.course, id_form.birthday, id_form.address, id_form.contact, id_form.contact_fname, id_form.contact_mname, id_form.contact_lname, id_form.contact_address, id_form.contact_no FROM users LEFT OUTER JOIN id_form ON users.stud_id = id_form.stud_id WHERE users.id = '$id'";
    $resultset = $conn->query($sql) or die($conn->error);
    $data = array();
        while( $rows = mysqli_fetch_assoc($resultset) ) {
            $data = $rows;
        }
        echo json_encode($data);
}