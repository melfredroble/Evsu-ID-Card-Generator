<?php

if(!isset($_SESSION['userName']) && !isset($_SESSION['userType']) == 'admin') {

    header("Location: login.php");

}



?>



            <div class="container-fluid px-4 bg-light h-75">
                <div class="row g-3 my-2">
                <?php

include "../db/db.php";

$form = "SELECT * FROM id_form";
$form_data = $conn->query($form) or die($conn->error);
$total_row = $form_data->num_rows;

if($total_row > 0){

?>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $total_row; ?></h3>
                                <p class="fs-5">Generated ID</p>
                            </div>
                            <i class="fas fa-id-card-alt fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

<?php
} else {
?>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Generated ID</p>
                            </div>
                            <i class="fas fa-id-card-alt fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
<?php
} 

$printed = "SELECT * FROM users WHERE status > 0 ";
$printed_id = $conn->query($printed) or die($conn->error);
$total_printed = $printed_id->num_rows;

if($total_printed > 0){
?>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $total_printed ?></h3>
                                <p class="fs-5">Printed ID</p>
                            </div>
                            <i class="fas fa-print fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

<?php
} else {
?>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Printed ID</p>
                            </div>
                            <i class="fas fa-print fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

<?php
}

include "../db/db.php";

$sql = "SELECT * FROM users";
$user = $conn->query($sql) or die($conn->error);
$total = $user->num_rows;

if($total > 0){

?>
    
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $total; ?></h3>
                                <p class="fs-5">Students</p>
                            </div>
                            <i class="fas fa-users fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
<?php
} else {
?>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Students</p>
                            </div>
                            <i class="fas fa-users fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
<?php
}

$request = "SELECT * FROM request";
$req = $conn->query($request) or die($conn->error);
$total_req = $req->num_rows;

if($total_req > 0){
?>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $total_req ?></h3>
                                <p class="fs-5">Request</p>
                            </div>
                            <i class="fas fa-thumbtack fs-1 text-danger  border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
<?php
} else {
?>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Request</p>
                            </div>
                            <i class="fas fa-user-secret fs-1 text-danger  border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
<?php
}
?>
                </div>
            </div>