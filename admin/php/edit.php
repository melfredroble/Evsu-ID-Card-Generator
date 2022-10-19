<?php

session_start();

include "../../db/db.php";

if(isset($_POST['update'])){


            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name']; 
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $fileError = $_FILES['file']['error'];
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $course = $_POST['course'];
            $bday = $_POST['bday'];
            $address = $_POST['address'];
            $stud_no = $_POST['stud_id'];
            $contact = $_POST['contact'];
            $contact_fname = $_POST['contact_fname'];
            $contact_mname = $_POST['contact_mname'];
            $contact_lname = $_POST['contact_lname'];
            $contact_address = $_POST['contact_address'];
            $contact_no = $_POST['contact_no'];





            $sql = "UPDATE users LEFT JOIN id_form ON users.stud_id = id_form.stud_id SET users.first_name = '$fname', users.last_name = '$lname', users.stud_id = '$stud_no', id_form.stud_id = '$stud_no',  id_form.middle_name = '$mname', id_form.course = '$course', id_form.birthday = '$bday', id_form.address = '$address', id_form.contact = '$contact', id_form.contact_fname = '$contact_fname', id_form.contact_mname = '$contact_mname', id_form.contact_lname = '$contact_lname', id_form.contact_address = '$contact_address', id_form.contact_no = '$contact_no' WHERE users.id = '$id'";
            $conn->query($sql) or die($conn->error);
    
            $success = "Form submitted successfully!";
            header("Location: ../?page=id_list&success=$success");


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            
            $allowed = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
            if($fileError === 0) {
                if(in_array($fileActualExt, $allowed)) {
                    if($fileSize < 2000000){
                            
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $fileNameNew = uniqid('', true).".". $fileActualExt;
                        $fileDestination = '../../upload/'.$fileNameNew;

                        $sql = "UPDATE users LEFT JOIN id_form ON users.stud_id = id_form.stud_id SET users.first_name = '$fname', users.last_name = '$lname',  users.stud_id = '$stud_no', id_form.stud_id = '$stud_no', id_form.middle_name = '$mname', id_form.img = '$fileNameNew', id_form.course = '$course', id_form.birthday = '$bday', id_form.address = '$address', id_form.contact = '$contact', id_form.contact_fname = '$contact_fname', id_form.contact_mname = '$contact_mname', id_form.contact_lname = '$contact_lname', id_form.contact_address = '$contact_address', id_form.contact_no = '$contact_no' WHERE users.id = '$id'";
                        if($conn->query($sql) === TRUE){   
                            $success = "Form submitted successfully!";
                            header("Location: ../?page=id_list&success=$fileNameNew");
                        } else {
                            $error = "Something wrong happend!";
                            header("Location: ../?page=id_list&error=$error");
                        } 
                            
                        move_uploaded_file($tmp_name, $fileDestination);

                    } else {
                        $error = "File is too large";
                            header("Location: ../?page=list&error=$error");
                    }
                } else {
                    $error = "Invalid type of file";
                    header("Location: ../?page=id_list&error=$error");
                    
                }
            
            } 

        }



// Edit Admin

if(isset($_POST['update-admin'])){


    $id = $_POST['adminid'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "UPDATE admin SET username = '$uname', password = '$pwdhashed' WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);

    $success = "Updated Successfully";
    header("Location: ../?page=admin&success=$success");

}

    
    



