<?php

include('db/db.php');

    $id = $_POST['studId'];

    $sql = "UPDATE users SET read_unread = 1 WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);

$data['id'] = $_POST['studId'];

echo json_encode($data);
exit;