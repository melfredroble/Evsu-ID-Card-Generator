<?php




if(!isset($_SESSION['userId'])) {

    header("Location: ?page=login");

}
?>

<style>
    /* 
    .homepage {
        background-image: url(img/webb4.png) !important;
        background-size: cover;
    } */

    .btn-danger {
        background-color: rgb(173, 33, 33);
    }
</style>

<div class="container-fluid homepage d-flex justify-content-center h-100 align-items-center bg-light ">
    <div class="row justify-content-center w-100 h-100">
        <div class="col-12 col-lg-10 d-flex justify-content-center align-items-center flex-column pb-5">
            <div class="logo">
                <img src="img\img.png" class="mb-3" width="100" alt="">
            </div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h1 class="my-3 fw-bold  text-center">EASTERN VISAYAS STATE UNIVERSITY</h1>
                <h2 class="text-center">Student ID Card Generator System</h2>
                <h5 class="my-3  text-center">Ormoc City Campus</h5>
            </div>
            <div class="text-center">
                <a href="?page=idform" class="btn btn-danger px-3 py-2 shadow-none"> <i class="fas fa-pen"></i> Student
                    ID
                    form</a>
            </div>
        </div>
    </div>
</div>