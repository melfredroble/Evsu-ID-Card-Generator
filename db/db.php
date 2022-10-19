<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "id_system";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if($conn->connect_error) {

    die($conn->connect_error);

} 