<?php

include "../db/db.php";

if(isset($_POST['update'])) {
	

	$id = $_POST['id-no'];
	$stud_no = $_POST['stud_no'];

    // $sql = "DELETE FROM id_form WHERE id = '$id'";
    // $conn->query($sql) or die($conn->error);

    header("Location: .?page=id_list&$stud_no");
} 
?>
