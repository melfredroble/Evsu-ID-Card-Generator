<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link href="bootstrap5/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap5/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>


<style>

    .danger {
        background-color: rgb(247, 73, 73) !important;
    }
</style>

<div class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center w-100 ">
        <h1 class="text-center text-secondary mb-3">Student ID Card Generator System</h1>
        <div class="col-12 col-sm-8 col-md-6 col-lg-4 ">
            <div class="card rounded ">
                <div class="card--header rounded-top bg-danger">

                </div>
                <form action="php/signupform.php" method="POST" class="m-0 p-0">
                    <div class="card-body mx-3  p-0 d-flex justify-content-center align-items-center flex-column">
                        <h3 class="text-center text-danger mt-3">Sign Up</h3>
                        <p class=" text-center w-100  text-secondary">
                            <?php 
                            if(isset($_GET['error'])){
                                $error = $_GET['error']; 
                                echo '<i class="fas fa-times-circle text-danger"></i>' . ' ' . $error ; 
                            }
                            
                            ?>
                        </p>
                        <div class="form-group w-75">
                            <input type="text" class="form-control" name="fname" autocomplete="off" required>
                            <label for="name" class=" form-label"><span class="content-name">First
                                    name</span></label>
                        </div>
                        <div class="form-group w-75">
                            <input type="text" autocomplete="off" name="lname" class="form-control " required>
                            <label for="" class="form-label">
                                <span class="content-name">Last
                                    name</span>
                            </label>
                        </div>
                        <div class="form-group w-75">
                            <input type="text" class="form-control" name="stud_id" autocomplete="off" required>
                            <label for="" class=" form-label">
                                <span class="content-name">Student No.</span>
                            </label>
                        </div>
                        <div class="form-group w-75">
                            <input type="password" class="form-control" name="pwd" autocomplete="off" required>
                            <label for="" class="form-label">
                                <span class="content-name">Password</span>
                            </label>
                        </div>
                        <div class="form-group w-75">
                            <input type="password" class="form-control" name="confirm_pwd" autocomplete="off" required>
                            <label for="" class=" form-label">
                                <span class="content-name">Confirm password</span>
                            </label>
                        </div>
                    </div>
                    <div
                        class="card-footer mt-2 pb-3 bg-white border-0 d-flex justify-content-center align-items-center flex-column">
                        <button class="btn btn-danger mb-2 w-75  shadow-none" type="submit" name="submit">Sign
                            up</button>
                        <p>Already have an account? <a href="login.php" class="text-decoration-none text-danger">Sign
                                In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>




<!-- 
    <script type="text/javascript">
        window.addEventListener("scroll", function () {

            let header = document.querySelector("header");
            header.classList.toggle("sticky", scrollY > 0)

        });

        const list = document.querySelectorAll('.list');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink));
    </script> -->