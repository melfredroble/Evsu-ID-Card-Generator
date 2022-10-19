<?php



if(!isset($_SESSION['userId'])){

    header("Location: ?page=login");

}

?>


<style>
    input {
        border: 1px solid #ccc;
        outline: none;
    }

    .card--header {
        height: 10px !important;
    }

    .container {
        height: 80vh;
    }
</style>


<div class="container  flex-column d-flex justify-content-center align-items-center">
    <div class="mb-3">
        <h3 class="text-secondary text-center">Reset password</h3>
        <p class="text-center text-success">
            <?php
                if(isset($_GET['success'])){

                    $success = $_GET['success'];
                    echo '<i class="fas fa-check"></i>' . ' ' . $success;

                }

                if(isset($_GET['error'])){

                    $error = $_GET['error'];
                    echo '<p class="text-center text-danger"><i class="fas fa-times"></i>' . ' ' . $error;

                }
            ?>
            </p>
    </div>
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card">
                <div class="card--header  rounded-top bg-danger w-100"></div>
                <div class="card-body">
                <form action="php/pwd.php" method="POST" class="p-3">
                    <div class="list-group py-2">
                        <input type="hidden" name="id" value="<?= $_SESSION['userStudId']?>">
                        <label for="" class="mb-2">Current password:</label>
                        <input type="password" name="password" class="px-2 py-1">
                    </div>
                    <div class="list-group py-2">
                        <label for=""  class="mb-2">New password:</label>
                        <input type="password" name="new_password" class="px-2 py-1">
                    </div>
                    <div class="text-end mt-3">
                        <input type="submit" name="submit" class="btn btn-danger ">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>