<?php


include "../db/db.php";

if(isset($_POST['submit'])){

    $stud_no = $_POST['stud_no'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO `request`(`stud_id`,`first_name`,`last_name`,`reason`) VALUES ('$stud_no','$fname','$lname','$reason')";
    $conn->query($sql) or die($conn->error);

    $success = "Successfully submitted!";
    header("Location: ../?page=request&success=$success");

}