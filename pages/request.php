<?php



if(!isset($_SESSION['userId'])){

    header("Location: ?page=login");

}

?>


<style>
    input,
    textarea {
        border: 1px solid #ccc;
        outline: none;
    }

    .card--header {
        height: 10px !important;
    }
</style>


<div class="container-fluid py-5">
    <div class="pb-3">
        <h2 class="text-center text-secondary ">Request for reprinting of ID</h2>
        <p class="text-center text-success">
        <?php
            if(isset($_GET['success'])){

                $success = $_GET['success'];
                echo '<i class="fas fa-check"></i>' . ' ' . $success;

            }
        ?>
        </p>
    </div>
    <div class="row justify-content-center">
        <?php

        include "db/db.php";
        
        $stud_id = $_SESSION['userStudId'];
        $id = $_SESSION['userId'];
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $user = $conn->query($sql) or die($conn->error);
        $row = $user->fetch_assoc();
        
        foreach($user as $row){
        
        ?>
        <div class="col-12 col-lg-6">
            <div class="card ">
                <div class="card--header rounded-top bg-danger w-100"></div>
                <form action="php/process.php" method="POST" class="p-3">
                    <div class="list-group">
                        <label for="color">Student No.:</label>
                        <input type="text" class="p-2 " name="stud_no" value="<?= $row['stud_id'] ?>" required>
                    </div>
                    <div class=" d-flex flex-lg-row flex-column">
                        <div class="list-group w-100 pe-1">
                            <label for="">First name:</label>
                            <input type="text"  name="fname" class="p-2" value="<?= $row['first_name'] ?>" required>
                        </div>
                        <div class="list-group w-100 ps-1">
                            <label for="">Last name:</label>
                            <input type="text" name="lname" class="p-2" value="<?= $row['last_name'] ?>" required>
                        </div>
                    </div>
                    <div class="list-group">
                        <label for="">Reason:</label>
                        <textarea name="reason" class="p-2" id="" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="text-end mt-3">
                        <input type="submit" name="submit" class="btn btn-danger ">
                    </div>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>